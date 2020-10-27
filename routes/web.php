<?php


use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});
  

Auth::routes();

Route::group(['middleware' => ['auth']], function () {


    Route::get('/home', 'HomeController@index')->name('home');
 //Product Creation
    Route::get('product/index', 'ProductController@index')->name('products');
    Route::get('products/index', 'ProductController@products')->name('admin.products')->middleware('is_admin');
    Route::get('product/create', 'ProductController@create')->name('create-product')->middleware('is_admin');
    Route::post('product/create', 'ProductController@store')->name('create-product')->middleware('is_admin');
    Route::get('product/view/{product}', 'ProductController@show')->name('view-product')->middleware('is_admin');
    Route::get('product/edit/{product}', 'ProductController@edit')->name('edit-product')->middleware('is_admin');
    Route::post('product/edit/{product}', 'ProductController@update')->name('update-product')->middleware('is_admin');
    Route::DELETE('product/delete/{product}', 'ProductController@delete')->name('delete-product')->middleware('is_admin');


    //School Creating
    Route::get('school/index', 'SchoolController@index')->name('schools');
    Route::get('school/create', 'SchoolController@create')->name('create-school');
    Route::post('school/create', 'SchoolController@store')->name('create-school');
    Route::get('school/view/{school}', 'SchoolController@show')->name('view-school');
    Route::get('school/edit/{school}', 'SchoolController@edit')->name('edit-school');
    //Route::put('school/close_deal/{school}','SchoolController@complete_deal')->name('close');
    //Route::delete('school/open_deal/{school}','SchoolController@open_deal')->name('open');    
    Route::get('school/deal/{school}', 'SchoolController@close_deal')->name('close-deal');
    Route::POST('school/deal/{school}', 'SchoolController@store_close_deal')->name('close-deal');
    Route::get('school/note/{school}', 'SchoolController@school_note')->name('add-school-note');
    Route::POST('school/note/{school}', 'SchoolController@store_note')->name('add-school-note');
    Route::post('school/edit/{school}', 'SchoolController@update')->name('update-school');
    Route::DELETE('school/delete/{school}', 'SchoolController@delete')->name('delete-school');
  
    
    //Note Making
    Route::get('note/create', 'NoteController@create')->name('create-note');
    Route::post('note/create', 'NoteController@store')->name('create-note');
    Route::get('note/view/{note}', 'NoteController@show')->name('view-note');
    Route::get('admin/note/view/{note}', 'NoteController@note_details')->name('admin-view-note')->middleware('is_admin');
    Route::get('note/edit/{note}', 'NoteController@edit')->name('edit-note');
    Route::post('note/edit/{note}', 'NoteController@update')->name('update-note');
    Route::DELETE('note/delete/{note}', 'NoteController@delete')->name('delete-note');

    Route::get('profile/{profile}', 'ProfileController@show')->name('profile');
    Route::get('edit-profile/{profile}', 'ProfileController@edit')->name('edit-profile');
    Route::PUT('update-profile/{profile}', 'ProfileController@update')->name('update-profile');
    Route::post('update-password', 'ProfileController@updatePassword')->name('change.password');
    Route::post('update-user_details', 'ProfileController@update_info')->name('change.details');

    

    //admin section

//Package Creation
Route::PUT('affiliate/payment/{school}', 'AdminController@payment')->name('pay-affiliate')->middleware('is_admin');
Route::get('school/details/{school}', 'AdminController@show')->name('school-details')->middleware('is_admin');
Route::get('school/view/note/{school}', 'SchoolController@view_note')->name('view-school-note')->middleware('is_admin');
Route::get('package/index', 'PackageController@index')->name('packages')->middleware('is_admin');
Route::get('schools/index', 'AdminController@schools')->name('admin.schools')->middleware('is_admin');
Route::get('package/create', 'PackageController@create')->name('create-package')->middleware('is_admin');
Route::post('package/create', 'PackageController@store')->name('create-package')->middleware('is_admin');
Route::get('package/view/{package}', 'PackageController@show')->name('view-package')->middleware('is_admin');
Route::get('package/edit/{package}', 'PackageController@edit')->name('edit-package')->middleware('is_admin');
Route::post('package/edit/{package}', 'PackageController@update')->name('update-package')->middleware('is_admin');
Route::DELETE('package/delete/{package}', 'PackageController@delete')->name('delete-package')->middleware('is_admin');


    Route::get('admin', 'AdminController@index')->name('admin')->middleware('is_admin');
    Route::get('users', 'UserController@index')->name('users')->middleware('is_admin');
    Route::get('users/{id}', 'UserController@editfund')->name('add-deduct')->middleware('is_admin');
    
    Route::post('user/mail/{profile}', 'profileController@send_user_email')->name('mail-user')->middleware('is_admin');
    Route::get('user/mail/{profile}', 'profileController@sendMail')->name('mail-user')->middleware('is_admin');
    Route::get('user/note/{profile}', 'UserController@viewNote')->name('view-user-note')->middleware('is_admin');
    Route::get('user/{profile}', 'UserController@edit')->name('edit-user')->middleware('is_admin');
    Route::get('adduser', 'UserController@adduser')->name('add-user')->middleware('is_admin');
      
    Route::post('admin-createuser', 'UserController@createuser')->name('create-user')->middleware('is_admin');
    Route::PUT('update-password/{id}', 'UserController@updatePassword')->name('admin.password');
    Route::post('sendtransaction', 'AdminController@sendtransaction')->name('sendtransaction');
    Route::PUT('approvecancel/{cancel}', 'AdminController@approvecancel')->name('approve-cancel')->middleware('is_admin');
    Route::DELETE('admin-delete/{user}', 'UserController@destroy')->name('admin-delete')->middleware('is_admin');
});
