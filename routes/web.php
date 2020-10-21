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

//Tài khoản
Route::group(['prefix' => 'account'], function() {
    //Thông tin tài khoản
    Route::get('/','Frontend\AccountController@account')->name('frontend.account');
    Route::post('updateaccount','Frontend\AccountController@updateaccount')->name('frontend.updateaccount');

    //Đổi ảnh đại diện
    Route::post('update_image_profile','Frontend\AccountController@update_image_profile')->name('frontend.update_image_profile');

    //Đổi mật khẩu
    Route::get('changepass','Frontend\AccountController@changepass')->name('frontend.changepass');
    Route::post('changepass','Frontend\AccountController@postchangepass')->name('frontend.postchangepass');

    //Lịch sử mua hàng
    Route::get('purchase','Frontend\AccountController@purchase')->name('frontend.purchase');
    Route::get('detailpurchase/{id}','Frontend\AccountController@detailpurchase')->name('frontend.detailpurchase');
    Route::get('cancelorder/{id}','Frontend\AccountController@cancelorder')->name('frontend.cancelorder');
});


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
    Route::get('addcart','Frontend\CartController@addcart')->name('frontend.addcart');

    //Giảm số lượng sản phẩm
    Route::get('reducequantity','Frontend\CartController@reducequantity')->name('frontend.reducequantity');

    //Tăng số lượng sản phẩm
    Route::get('updatequantity','Frontend\CartController@updatequantity')->name('frontend.updatequantity');

    //Xóa sản phẩm khỏi giỏ hàng
    Route::get('deletecart','Frontend\CartController@deletecart')->name('frontend.deletecart');
});


//Thanh toán
Route::group(['prefix' => 'checkout'], function() {
    Route::get('/','Frontend\CheckoutController@checkout')->name('frontend.checkout');

    Route::post('postcode','Frontend\CheckoutController@postcode')->name('frontend.postcode');

    Route::post('postpayment','Frontend\CheckoutController@postpayment')->name('frontend.postpayment');
});


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
    Route::get('detailproduct/{id}','Frontend\ProductController@detailproduct')->name('frontend.detailproduct');

    Route::get('search','Frontend\ProductController@search')->name('frontend.search');
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
    Route::get('/','Admin\AdminController@admin')->name('admin')->middleware('checkadmin');

    Route::get('login','Admin\AdminController@login')->name('admin.login');
    Route::post('login','Admin\AdminController@postlogin')->name('admin.postlogin');

    Route::get('logout','Admin\AdminController@logout')->name('admin.logout');
});

//Quản lý chi nhánh
Route::group(['prefix' => 'branch','middleware'=>['checkadmin']], function() {
    Route::get('/','Admin\BranchController@getbranch')->name('admin.branch');
    Route::get('deletebanner/{id}','Admin\BranchController@deletebranch')->name('admin.deletebranch');

    Route::get('addbranch','Admin\BranchController@addbranch')->name('admin.addbranch');
    Route::post('postaddbranch','Admin\BranchController@postaddbranch')->name('admin.postaddbranch');

    Route::get('editbranch/{id}','Admin\BranchController@editbranch')->name('admin.editbranch');
    Route::post('posteditbranch','Admin\BranchController@posteditbranch')->name('admin.posteditbranch');
});

//Quản lý banner
Route::group(['prefix' => 'banner','middleware'=>['checkadmin']], function() {
    Route::get('/','Admin\BannerController@getbanner')->name('admin.banner');

    Route::get('editbanner/{id}','Admin\BannerController@editbanner')->name('admin.editbanner');
    Route::post('posteditbanner','Admin\BannerController@posteditbanner')->name('admin.posteditbanner');
});

//Quản lý section
Route::group(['prefix' => 'section','middleware'=>['checkadmin']], function() {
    Route::get('/','Admin\sectionController@getsection')->name('admin.section');
    Route::get('deletesection/{id}','Admin\sectionController@deletesection')->name('admin.deletesection');

    Route::get('addsection  ','Admin\sectionController@addsection')->name('admin.addsection');
    Route::post('postaddsection','Admin\sectionController@postaddsection')->name('admin.postaddsection');

    Route::get('editsection/{id}','Admin\sectionController@editsection')->name('admin.editsection');
    Route::post('posteditsection','Admin\sectionController@posteditsection')->name('admin.posteditsection');
});

//Quản lý liên hệ
Route::group(['prefix' => 'contact','middleware'=>['checkadmin']], function() {
    Route::get('/','Admin\ContactController@getcontact')->name('admin.contact');

    Route::get('getrefcontact/{id}','Admin\ContactController@getrefcontact')->name('admin.getrefcontact');
    Route::post('postrefcontact','Admin\ContactController@postrefcontact')->name('admin.postrefcontact');
});

//Quản lý danh mục
Route::group(['prefix' => 'category','middleware'=>['checkadmin']], function() {
    // QUản lý danh mục sản phẩm
    Route::get('/','Admin\CategoryController@getcategory')->name('admin.category');
    Route::get('deletecategory/{id}','Admin\CategoryController@deletecategory')->name('admin.deletecategory');

    Route::get('addcategory','Admin\CategoryController@addcategory')->name('admin.addcategory');
    Route::post('postaddcategory','Admin\CategoryController@postaddcategory')->name('admin.postaddcategory');

    Route::get('editcategory/{id}','Admin\categoryController@editcategory')->name('admin.editcategory');
    Route::post('posteditcategory','Admin\categoryController@posteditcategory')->name('admin.posteditcategory');
    
    // QUản lý danh mục tin
    Route::get('news','Admin\CategoryController@getcategorynews')->name('admin.categorynews');
    Route::get('deletecategorynews/{id}','Admin\CategoryController@deletecategorynews')->name('admin.deletecategorynews');

    Route::get('addcategorynews','Admin\CategoryController@addcategorynews')->name('admin.addcategorynews');
    Route::post('postaddcategorynews','Admin\CategoryController@postaddcategorynews')->name('admin.postaddcategorynews');

    Route::get('editcategorynews/{id}','Admin\categoryController@editcategorynews')->name('admin.editcategorynews');
    Route::post('posteditcategorynews','Admin\categoryController@posteditcategorynews')->name('admin.posteditcategorynews');
});

//Quản lý tin tức
Route::group(['prefix' => 'adminnews','middleware'=>['checkadmin']], function() {
    Route::get('/','Admin\NewsController@getnews')->name('admin.news');
    Route::get('deletenews/{id}','Admin\NewsController@deletenews')->name('admin.deletenews');

    Route::get('addnews','Admin\NewsController@addnews')->name('admin.addnews');
    Route::post('postaddnews','Admin\NewsController@postaddnews')->name('admin.postaddnews');

    Route::get('editnews/{id}','Admin\NewsController@editnews')->name('admin.editnews');
    Route::post('posteditnews','Admin\NewsController@posteditnews')->name('admin.posteditnews');
});

//Quản lý sản phẩm
Route::group(['prefix' => 'adminproduct','middleware'=>['checkadmin']], function() {
    Route::get('/','Admin\ProductController@getproduct')->name('admin.product');
    Route::get('deleteproduct/{id}','Admin\ProductController@deleteproduct')->name('admin.deleteproduct');

    Route::get('addproduct','Admin\ProductController@addproduct')->name('admin.addproduct');
    Route::post('postaddproduct','Admin\ProductController@postaddproduct')->name('admin.postaddproduct');

    Route::get('editproduct/{id}','Admin\ProductController@editproduct')->name('admin.editproduct');
    Route::post('posteditproduct','Admin\ProductController@posteditproduct')->name('admin.posteditproduct');
});

// Quản lý doanh thu
Route::group(['prefix' => 'revenue','middleware'=>['checkadmin']], function() {
    Route::get('/','Admin\RevenueController@list_import')->name('admin.list_import');
    Route::get('sales','Admin\RevenueController@getsales')->name('admin.sales');

    Route::get('import_goods','Admin\RevenueController@import_goods')->name('admin.import_goods');
    Route::post('import_goods','Admin\RevenueController@postimport_goods')->name('admin.postimport_goods');
});

//Quản lí tài khoản và quyền
Route::group(['prefix' => 'adminaccount','middleware'=>['checkadmin']], function() {
    Route::get('/','Admin\AccountController@listuser')->name('admin.listuser');
    Route::get('deleteuser/{id}','Admin\AccountController@deleteuser')->name('admin.deleteuser');

    Route::get('subadmin','Admin\AccountController@listsubadmin')->name('admin.listsubadmin');

    Route::get('addsubadmin','Admin\AccountController@addsubadmin')->name('admin.addsubadmin');
    Route::post('addsubadmin','Admin\AccountController@postaddsubadmin')->name('admin.postaddsubadmin');

    Route::get('editsubadmin/{id}','Admin\AccountController@editsubadmin')->name('admin.editsubadmin');
    Route::post('editsubadmin','Admin\AccountController@posteditsubadmin')->name('admin.posteditsubadmin');

    Route::get('editmyaccount/{id}','Admin\AccountController@editmyaccount')->name('admin.editmyaccount');
    Route::post('editmyaccount','Admin\AccountController@posteditmyaccount')->name('admin.posteditmyaccount');
    Route::post('changepassword','Admin\AccountController@postchangepassword')->name('admin.postchangepassword');

    Route::get('listcomment','Admin\AccountController@listcomment')->name('admin.listcomment');

    Route::get('deletecomment/{id}','Admin\AccountController@deletecomment')->name('admin.deletecomment');
});

//Quản lí discount
Route::group(['prefix' => 'discount','middleware'=>['checkadmin']], function() {
    //Danh sách discount
    Route::get('discount', 'Admin\DiscountController@index')->name('admin.discount');

    //Thêm discount
    Route::get('adddiscount', 'Admin\DiscountController@adddiscount')->name('admin.adddiscount');
    Route::post('adddiscount', 'Admin\DiscountController@postadddiscount')->name('admin.postadddiscount');
    
    //Xóa discount
    Route::get('deletediscount', 'Admin\DiscountController@adddiscount')->name('admin.deletediscount');
});

//Quản lí đơn hàng
Route::group(['prefix' => 'order','middleware'=>['checkadmin']], function() {
    Route::get('/','Admin\OrderController@order')->name('admin.order');
    Route::get('detailorder/{id}','Admin\OrderController@detailorder')->name('admin.detailorder');
    Route::get('updateorder/{id}/{status}','Admin\OrderController@updateorder')->name('admin.updateorder');
});

//Xuất exel
Route::group(['prefix' => 'export'], function() {
    Route::get('exportorder', 'Export\ExportOrderController@exportorder')->name('admin.exportorder');
});
