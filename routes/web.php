<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/article/index', 'ArticleController@index')->name('article.index');
Route::get('/article/view/{id}', 'ArticleController@view')->name('article.view');

Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
    //article
    Route::get('/', 'ArticleController@index')->name('backend.index');
    Route::get('/article/index', 'ArticleController@index')->name('backend.article.index');
    Route::get('/article/create', 'ArticleController@create')->name('backend.article.create');
    Route::get('/article/view/{id}', 'ArticleController@view')->name('backend.article.view');
    Route::get('/article/edit/{id}', 'ArticleController@edit')->name('backend.article.edit');
    Route::post('/article/update/{id}', 'ArticleController@update')->name('backend.article.update');
    Route::post('/article/store', 'ArticleController@store')->name('backend.article.store');
    Route::get('/article/destroy/{id}', 'ArticleController@destroy')->name('backend.article.destroy');
    Route::get('/article/restore/{id}', 'ArticleController@restore')->name('backend.article.restore');
    Route::post('/article/uploadImage', 'ArticleController@uploadImage')->name('backend.article.uploadImage');

    //article category
    Route::get('/articleCategory/index', 'ArticleCategoryController@index')->name('backend.articleCategory.index');
    Route::get('/articleCategory/create', 'ArticleCategoryController@create')->name('backend.articleCategory.create');
    Route::get('/articleCategory/view/{id}', 'ArticleCategoryController@view')->name('backend.articleCategory.view');
    Route::get('/articleCategory/edit/{id}', 'ArticleCategoryController@edit')->name('backend.articleCategory.edit');
    Route::post('/articleCategory/update/{id}', 'ArticleCategoryController@update')->name('backend.articleCategory.update');
    Route::post('/articleCategory/store', 'ArticleCategoryController@store')->name('backend.articleCategory.store');
    Route::get('/articleCategory/destroy/{id}', 'ArticleCategoryController@destroy')->name('backend.articleCategory.destroy');
    Route::get('/articleCategory/restore/{id}', 'ArticleCategoryController@restore')->name('backend.articleCategory.restore');

    //user
    Route::get('/user/index', 'UserController@index')->name('backend.user.index');
});