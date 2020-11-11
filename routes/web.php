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
 

    //Athr Creation
    Route::get('athr/index', 'AthrController@index')->name('athrs');
    Route::get('athrs/index', 'AthrController@athrs')->name('admin.athrs')->middleware('is_admin');
    Route::get('athr/create', 'AthrController@create')->name('create-athr');
    Route::post('athr/create', 'AthrtController@store')->name('create-athr');
    Route::get('athr/view/{athr}', 'AthrController@show')->name('view-athr');
    Route::get('athr/edit/{athr}', 'AthrController@edit')->name('edit-athr');
    Route::post('athr/edit/{athr}', 'AthrController@update')->name('update-athr');
    Route::DELETE('athr/delete/{athr}', 'AthrController@delete')->name('delete-athr');

   //AthrPackage Creation
   Route::get('athrpackage/index', 'AthrPackageController@index')->name('athrpackages');
   Route::get('athrpackages/index', 'AthrPackageController@athrs')->name('admin.athrpackages')->middleware('is_admin');
   Route::get('athrpackage/create', 'AthrPackageController@create')->name('create-athrpackage');
   Route::post('athrpackage/create', 'AthrPackagetController@store')->name('create-athrpackage');
   Route::get('athrpackage/view/{athrpackage}', 'AthrPackageController@show')->name('view-athrpackage');
   Route::get('athrpackage/edit/{athrpackage}', 'AthrPackageController@edit')->name('edit-athrpackage');
   Route::post('athrpackage/edit/{athrpackage}', 'AthrPackageController@update')->name('update-athrpackage');
   Route::DELETE('athrpackage/delete/{athrpackage}', 'AthrPackageController@delete')->name('delete-athrpackage');



    //School Creation
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
  
     
    //School Notes
    Route::get('school/view_note/{school}', 'SchoolController@show_school_note')->name('school-view-school_note');
    Route::get('school/view_note_details/{school}', 'SchoolController@show_school_note_details')->name('view-school_note');
    Route::get('school/note/edit/{schoolnote}', 'SchoolController@edit_school_note')->name('edit-school_note');
    Route::POST('school/note/edit/{schoolnote}', 'SchoolController@update_school_note')->name('edit-school_note');
    Route::DELETE('school_note/delete/{schoolnote}', 'SchoolController@delete_note')->name('delete-school-note');
  
    //Note Making
    Route::get('note/create', 'NoteController@create')->name('create-note');
    Route::post('note/create', 'NoteController@store')->name('create-note');
    Route::get('note/view/{note}', 'NoteController@show')->name('view-note');
    
    Route::get('admin/affiliate/notes', 'AdminController@affiliate_notes')->name('affiliate.notes')->middleware('is_admin');
    Route::get('admin/allnote/view/{id}', 'AdminController@show_allnote')->name('admin-view-allnote')->middleware('is_admin');
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

    //comments section
    Route::get('admin/create_comment/{schoolnote}', 'CommentController@create')->name('create-comment')->middleware('is_admin');
    Route::POST('admin/create_comment/{schoolnote}', 'CommentController@store')->name('create-comment')->middleware('is_admin');

//Product Creation
Route::get('product/index', 'ProductController@index')->name('products');
Route::get('products/index', 'ProductController@products')->name('admin.products')->middleware('is_admin');
Route::get('product/create', 'ProductController@create')->name('create-product')->middleware('is_admin');
Route::post('product/create', 'ProductController@store')->name('create-product')->middleware('is_admin');
Route::get('product/view/{product}', 'ProductController@show')->name('view-product')->middleware('is_admin');
Route::get('product/edit/{product}', 'ProductController@edit')->name('edit-product')->middleware('is_admin');
Route::post('product/edit/{product}', 'ProductController@update')->name('update-product')->middleware('is_admin');
Route::DELETE('product/delete/{product}', 'ProductController@delete')->name('delete-product')->middleware('is_admin');



//SchoolPackage Creation
Route::PUT('affiliate/note/{note}', 'AdminController@mark_note')->name('mark-note')->middleware('is_admin');
Route::PUT('affiliate/payment/{school}', 'AdminController@payment')->name('pay-affiliate')->middleware('is_admin');
Route::get('school/details/{school}', 'AdminController@show')->name('school-details')->middleware('is_admin');
Route::get('school/view/note/{school}', 'SchoolController@view_note')->name('view-school-note')->middleware('is_admin');
Route::get('school/view/note_details/{school}', 'SchoolController@admin_view_note')->name('admin-view-school_note')->middleware('is_admin');
Route::get('package/index', 'PackageController@index')->name('packages')->middleware('is_admin');
Route::get('products/packages/index', 'PackageController@p_page')->name('products.packages')->middleware('is_admin');
Route::get('schools/index', 'AdminController@schools')->name('admin.schools')->middleware('is_admin');
Route::get('package/create', 'PackageController@create')->name('create-package')->middleware('is_admin');
Route::post('package/create', 'PackageController@store')->name('create-package')->middleware('is_admin');
Route::get('package/view/{package}', 'PackageController@show')->name('view-package')->middleware('is_admin');
Route::get('package/edit/{package}', 'PackageController@edit')->name('edit-package')->middleware('is_admin');
Route::post('package/edit/{package}', 'PackageController@update')->name('update-package')->middleware('is_admin');
Route::DELETE('package/delete/{package}', 'PackageController@delete')->name('delete-package')->middleware('is_admin');


    Route::get('admin', 'AdminController@index')->name('admin')->middleware('is_admin');
    Route::get('users', 'UserController@index')->name('users')->middleware('is_admin');
    Route::get('user/products/{user}', 'UserController@user_products')->name('user-product')->middleware('is_admin');
    
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
