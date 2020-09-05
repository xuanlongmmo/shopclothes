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
Route::get('contact','Frontend\ContactController@contact')->name('frontend.contact');
Route::post('contact','Frontend\ContactController@postcontact')->name('frontend.postcontact');

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
Route::group(['prefix' => 'blog'], function() {
    Route::get('/','Frontend\BlogController@blog')->name('frontend.blog');
});

//Admin
Route::group(['prefix' => 'admin'], function() {
    Route::get('/','Admin\AdminController@admin')->name('admin');
});

Route::group(['prefix' => 'branch'], function() {
    Route::get('/','Admin\BranchController@getbranch')->name('admin.branch');
    Route::get('deletebanner/{id}','Admin\BranchController@deletebranch')->name('admin.deletebranch');

    Route::get('addbranch','Admin\BranchController@addbranch')->name('admin.addbranch');
    Route::get('postaddbranch','Admin\BranchController@postaddbranch')->name('admin.postaddbranch');

    Route::get('editbranch/{id}','Admin\BranchController@editbranch')->name('admin.editbranch');
    Route::get('posteditbranch','Admin\BranchController@posteditbranch')->name('admin.posteditbranch');
});


Route::group(['prefix' => 'banner'], function() {
    Route::get('/','Admin\BannerController@getbanner')->name('admin.banner');

    Route::get('editbanner/{id}','Admin\BannerController@editbanner')->name('admin.editbanner');
    Route::get('posteditbanner','Admin\BannerController@posteditbanner')->name('admin.posteditbanner');
});

Route::group(['prefix' => 'section'], function() {
    Route::get('/','Admin\sectionController@getsection')->name('admin.section');
    Route::get('deletesection/{id}','Admin\sectionController@deletesection')->name('admin.deletesection');

    Route::get('addsection  ','Admin\sectionController@addsection')->name('admin.addsection');
    Route::get('postaddsection','Admin\sectionController@postaddsection')->name('admin.postaddsection');

    Route::get('editsection/{id}','Admin\sectionController@editsection')->name('admin.editsection');
    Route::get('posteditsection','Admin\sectionController@posteditsection')->name('admin.posteditsection');
});