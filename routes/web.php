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

/* 
    Error routes
*/
Route::get('/deny', 'HomeController@getDeny')->name('deny');

Auth::routes();

Route::get('/', 'HomeController@posts')->name('home');
Route::get('/post/{id}/{slug}', 'HomeController@post')->name('post');
Route::post('/search', 'HomeController@search')->name('search');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', 'HomeController@postContact')->name('contact.post');


Route::group(['prefix' => 'master','middleware' => 'admin'], function () {
    
    //Admin Home
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/message/{id}', 'AdminController@showMessage')->name('admin.message.show');
    Route::get('/profile/{id}', 'AdminController@getProfile')->name('admin.profile.edit');
    Route::put('/profile/{id}', 'AdminController@updateProfile')->name('admin.profile.update');
    
    //Blog routes
    Route::get('/blog', 'PostsController@index')->name('post.index');
    Route::get('/blog/create', 'PostsController@create')->name('post.create');
    Route::post('/blog/store', 'PostsController@store')->name('post.store');
    Route::get('/blog/edit/{id}/{slug}', 'PostsController@edit')->name('post.edit');
    Route::put('/blog/update/{id}', 'PostsController@update')->name('post.update');
    Route::get('/blog/delete/{id}', 'PostsController@delete')->name('post.delete');

    //Blog Categories
    Route::get('/blog/categories', 'PostCategoriesController@index')->name('category.index');
    Route::get('/blog/categories/create', 'PostCategoriesController@create')->name('category.create');
    Route::post('/blog/categories/store', 'PostCategoriesController@store')->name('category.store');
    Route::get('/blog/categories/edit/{id}', 'PostCategoriesController@edit')->name('category.edit');
    Route::put('/blog/categories/update/{id}', 'PostCategoriesController@update')->name('category.update');
    Route::get('/blog/categories/delete/{id}', 'PostCategoriesController@delete')->name('category.delete');

    //Blog Tags
    Route::get('/blog/tags', 'TagsController@index')->name('tag.index');
    Route::get('/blog/tags/create', 'TagsController@create')->name('tag.create');
    Route::post('/blog/tags/store', 'TagsController@store')->name('tag.store');
    Route::get('/blog/tags/edit/{id}', 'TagsController@edit')->name('tag.edit');
    Route::put('/blog/tags/update/{id}', 'TagsController@update')->name('tag.update');
    Route::get('/blog/tags/delete/{id}', 'TagsController@delete')->name('tag.delete');

    //About Page
    Route::get('/blog/about', 'AboutController@index')->name('about.index');
    Route::get('/blog/about/create', 'AboutController@create')->name('about.create');
    Route::post('/blog/about/post', 'AboutController@store')->name('about.store');
    Route::get('/blog/about/edit/{id}', 'AboutController@edit')->name('about.edit');
    Route::put('/blog/about/update/{id}', 'AboutController@update')->name('about.update');
    Route::get('/blog/about/delete/{id}', 'AboutController@delete')->name('about.delete');

    //About Widget Routes
    Route::resource('/widget', 'WidgetController');
    Route::get('/widget/delete/{id}', 'WidgetController@delete')->name('widget.delete');

    //Contact Widget Routes
    Route::get('/contact_widget/create', 'ContactWidgetController@create')->name('contact.widget.create');
    Route::post('/contact_widget/post', 'ContactWidgetController@post')->name('contact.widget.post');
    Route::get('/contact_widget/edit', 'ContactWidgetController@edit')->name('contact.widget.edit');
    Route::put('/contact_widget/update', 'ContactWidgetController@update')->name('contact.widget.update');

    //Profile Routes
    Route::get('/author/edit/{id}', 'AdminController@getProfile')->name('profile.edit');
    Route::put('/author/update/{id}', 'AdminController@updateProfile')->name('profile.update');

    //Messages
    Route::get('/messages', 'AdminController@getMessages')->name('messages.index');
    Route::get('/messages/{id}', 'AdminController@showMessage')->name('messages.show');
    
});