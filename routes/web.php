<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Trang chủ
Route::get('/','Frontend\HomeController@getIndex')->name('frontend.index');
Route::get('home','Frontend\HomeController@getIndex');

//Tài khoản
Route::get('account','Frontend\AccountController@account')->name('frontend.account');
Route::post('account','Frontend\AccountController@updateaccount')->name('frontend.updateaccount');

//Đăng nhập
Route::get('login','Auth\LoginController@getlogin')->name('frontend.getlogin');
Route::post('login','Auth\LoginController@login')->name('frontend.login');

//Reset password
Route::get('reset-password','Auth\LoginController@getreset')->name('frontend.getreset');
Route::post('reset-password', 'Auth\ResetPasswordController@sendMail')->name('frontend.sendmailreset');
Route::get('resetpassword', 'Auth\ResetPasswordController@reset')->name('frontend.sendreset');
Route::post('resetpassword', 'Auth\ResetPasswordController@sendpass')->name('frontend.sendpassreset');

//Đăng nhập social
Route::get('/auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('frontend.redirect');
Route::get('/auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('frontend.callback');

//Đăng kí
Route::get('register','Auth\LoginController@register')->name('frontend.register');
Route::post('register','Auth\LoginController@pregister')->name('frontend.pregister');

//Đăng xuất
Route::get('logout','Auth\LoginController@logout')->name('frontend.logout');

//Yêu thích
Route::group(['prefix' => 'wishlist'], function() {
    //Xem
    Route::get('/','Frontend\WishlistController@wishlist')->name('frontend.wishlist');

    //Thêm
    Route::get('addwishlist','Frontend\WishlistController@addwishlist')->name('frontend.addwishlist');
    
    //Xóa
    Route::get('deletewishlist','Frontend\WishlistController@deletewishlist')->name('frontend.deletewishlist');
});


//Giỏ hàng
Route::group(['prefix' => 'cart'], function() {
    //load giỏ hàng
    Route::get('/','Frontend\CartController@cart')->name('frontend.cart');
    Route::get('resetcart','Frontend\CartController@resetcart')->name('frontend.resetcart');

    //Thêm sản phẩm vào giỏ hàng
    Route::get('addcart/{id}','Frontend\CartController@addcart')->name('frontend.addcart');
});


//Thanh toán
Route::get('checkout','Frontend\CheckoutController@checkout')->name('frontend.checkout');

//Liên hệ
Route::get('lienhe','Frontend\ContactController@contact')->name('frontend.contact');
Route::post('lienhe','Frontend\ContactController@postcontact')->name('frontend.postcontact');

//Đăng kí nhận tin qua email
Route::get('subriceemail','Frontend\EmailController@subrice_email')->name('frontend.subriceemail');

//Sản phẩm
Route::group(['prefix' => 'product'], function() {
    //Sản phẩm
    Route::get('/','Frontend\ProductController@listproduct')->name('frontend.listproduct');

    //Chi tiết sản phẩm
    Route::get('detailproduct','Frontend\ProductController@detailproduct')->name('frontend.detailproduct');

    //Xem danh sách sản phẩm theo danh mục
    Route::get('/{slug_name}','Frontend\ProductController@detail_category')->name('frontend.detailcategory');

    Route::post('rating','Frontend\ProductController@postrate')->name('frontend.rating');
});


//tin tức
Route::group(['prefix' => 'news'], function() {
    Route::get('/','Frontend\NewsController@news')->name('frontend.news');

    Route::get('category/{slug_name}','Frontend\NewsController@detailcategory')->name('frontend.detailcategorynews');

    Route::get('detailnews/{id}','Frontend\NewsController@detailnews')->name('frontend.detailnews');

    Route::post('postcomment','Frontend\NewsController@postcomment')->name('frontend.postcomment');
});

//Admin
Route::group(['prefix' => 'admin'], function() {
    Route::get('/','Admin\AdminController@admin')->name('admin');
    // Route::get('/','Admin\AdminController@admin')->name('admin')->middleware('admin.checkadmin');
});

//Quản lý chi nhánh
Route::group(['prefix' => 'branch'], function() {
    Route::get('/','Admin\BranchController@getbranch')->name('admin.branch');
    Route::get('deletebanner/{id}','Admin\BranchController@deletebranch')->name('admin.deletebranch');

    Route::get('addbranch','Admin\BranchController@addbranch')->name('admin.addbranch');
    Route::get('postaddbranch','Admin\BranchController@postaddbranch')->name('admin.postaddbranch');

    Route::get('editbranch/{id}','Admin\BranchController@editbranch')->name('admin.editbranch');
    Route::get('posteditbranch','Admin\BranchController@posteditbranch')->name('admin.posteditbranch');
});

//Quản lý banner
Route::group(['prefix' => 'banner'], function() {
    Route::get('/','Admin\BannerController@getbanner')->name('admin.banner');

    Route::get('editbanner/{id}','Admin\BannerController@editbanner')->name('admin.editbanner');
    Route::get('posteditbanner','Admin\BannerController@posteditbanner')->name('admin.posteditbanner');
});

//Quản lý section
Route::group(['prefix' => 'section'], function() {
    Route::get('/','Admin\sectionController@getsection')->name('admin.section');
    Route::get('deletesection/{id}','Admin\sectionController@deletesection')->name('admin.deletesection');

    Route::get('addsection  ','Admin\sectionController@addsection')->name('admin.addsection');
    Route::get('postaddsection','Admin\sectionController@postaddsection')->name('admin.postaddsection');

    Route::get('editsection/{id}','Admin\sectionController@editsection')->name('admin.editsection');
    Route::get('posteditsection','Admin\sectionController@posteditsection')->name('admin.posteditsection');
});

//Quản lý liên hệ
Route::group(['prefix' => 'contact'], function() {
    Route::get('/','Admin\ContactController@getcontact')->name('admin.contact');

    Route::get('getrefcontact/{id}','Admin\ContactController@getrefcontact')->name('admin.getrefcontact');
    Route::post('postrefcontact','Admin\ContactController@postrefcontact')->name('admin.postrefcontact');
});

Route::group(['prefix' => 'category'], function() {
    Route::get('/','Admin\CategoryController@getcategory')->name('admin.category');
    Route::get('deletecategory/{id}','Admin\CategoryController@deletecategory')->name('admin.deletecategory');

    Route::get('addcategory','Admin\CategoryController@addcategory')->name('admin.addcategory');
    Route::post('postaddcategory','Admin\CategoryController@postaddcategory')->name('admin.postaddcategory');

    Route::get('editcategory/{id}','Admin\categoryController@editcategory')->name('admin.editcategory');
    Route::post('posteditcategory','Admin\categoryController@posteditcategory')->name('admin.posteditcategory');
});

Route::group(['prefix' => 'adminnews'], function() {
    Route::get('/','Admin\NewsController@getnews')->name('admin.news');
    Route::get('deletenews/{id}','Admin\NewsController@deletenews')->name('admin.deletenews');

    Route::get('addnews','Admin\NewsController@addnews')->name('admin.addnews');
    Route::post('postaddnews','Admin\NewsController@postaddnews')->name('admin.postaddnews');

    Route::get('editnews/{id}','Admin\NewsController@editnews')->name('admin.editnews');
    Route::post('posteditnews','Admin\NewsController@posteditnews')->name('admin.posteditnews');
});

Route::group(['prefix' => 'adminproduct'], function() {
    Route::get('/','Admin\ProductController@getproduct')->name('admin.product');
    Route::get('deleteproduct/{id}','Admin\ProductController@deleteproduct')->name('admin.deleteproduct');

    Route::get('addproduct','Admin\ProductController@addproduct')->name('admin.addproduct');
    Route::post('postaddproduct','Admin\ProductController@postaddproduct')->name('admin.postaddproduct');

    Route::get('editproduct/{id}','Admin\ProductController@editproduct')->name('admin.editproduct');
    Route::post('posteditproduct','Admin\ProductController@posteditproduct')->name('admin.posteditproduct');
});

Route::group(['prefix' => 'revenue'], function() {
    Route::get('/','Admin\RevenueController@list_import')->name('admin.list_import');
    Route::get('sales','Admin\RevenueController@getsales')->name('admin.sales');

    Route::get('import_goods','Admin\RevenueController@import_goods')->name('admin.import_goods');
    Route::post('import_goods','Admin\RevenueController@postimport_goods')->name('admin.postimport_goods');
});