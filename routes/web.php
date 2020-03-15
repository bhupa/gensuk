<?php

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


// Home controller

Route::get('/','HomeController@index')->name('home');
Route::get('/about-us','HomeController@getAbout')->name('about-us');

Route::resource('event', 'EventController');
Route::resource('blog', 'BlogController');
Route::resource('membership', 'MemberShipController');
Route::resource('contact-us', 'ContactController');
Route::resource('team', 'TeamController');
Route::resource('project', 'ProjectController');
Route::resource('gallery', 'GalleryController');
Route::resource('volunter', 'VolunterController');
Route::resource('investor', 'InvestorController');
Route::post('team/list','TeamController@list')->name('team.list');

Route::get('/dashboard','Backend\DashboardController@index')->name('dashboard');

Route::get('/login','Auth\LoginController@index')->name('login');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');


// forget password

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/resettoken/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.resettoken');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');

Route::group(['namespace'=>'Backend','middleware'=>'auth'], function() {

// route
//content Banner router

    Route::resource('content-banners', 'ContentBannerController');
    Route::post('/content-banners/change-status', 'ContentBannerController@changeStatus')->name('content-banners.change-status');

    //content Banner router

    Route::resource('contents', 'ContentController');
    Route::post('/contents/change-status', 'ContentController@changeStatus')->name('contents.change-status');



//    /content Banner router
    Route::post('/teams/sort','TeamController@sort')->name('teams.sort');
    Route::resource('teams', 'TeamController');
    Route::post('/teams/change-status', 'TeamController@changeStatus')->name('teams.change-status');


    //    /event router
    Route::resource('events', 'EventController');
    Route::post('/events/change-status', 'EventController@changeStatus')->name('events.change-status');
    Route::post('/events/volunters', 'EventController@volunters')->name('events.volunters');


    //    /event router
    Route::resource('settings', 'SettingController');
    Route::post('/settings/change-status', 'SettingController@changeStatus')->name('settings.change-status');


    //    /event router
    Route::resource('projects', 'ProjectController');
    Route::post('/projects/change-status', 'ProjectController@changeStatus')->name('projects.change-status');
    Route::post('/projects/investors', 'ProjectController@investors')->name('projects.investors');

    //    /gallery router
    Route::resource('gallerys', 'GalleryController');
    Route::post('/gallerys/change-status', 'GalleryController@changeStatus')->name('gallerys.change-status');

    // gallery images
    Route::prefix('gallery/image')->group(function(){
        Route::get('/{gallery_id}','GalleryImagesController@index')->name('gallery-image.index');
        Route::get('/{gallery_id}/create', 'GalleryImagesController@create')->name('gallery-image.create');
        Route::post('/{gallery_id}/store', 'GalleryImagesController@store')->name('gallery-image.store');
        Route::delete('/{gallery_id}/{image_id}', 'GalleryImagesController@destroy')->name('gallery-image.destroy');

    });

    //blog categories
    Route::resource('blog_categories','BlogCategoriesController');
    Route::post('/blog_categories/change-status','BlogCategoriesController@changeStatus')->name('blog_categories.change-status');


    Route::resource('blogs','BlogController');
    Route::post('/blogs/change-status','BlogController@changeStatus')->name('blogs.change-status');

    Route::post('/life-members/sort','LifeMemberController@sort')->name('life-members.sort');
    Route::resource('life-members','LifeMemberController');
    Route::post('/life-members/change-status','LifeMemberController@changeStatus')->name('life-members.change-status');

    Route::resource('contacts','ContactController');
    Route::resource('volunters','VolunterController');
    Route::resource('investors','InvestorController');
    Route::resource('memberships','MembershipController');
});
