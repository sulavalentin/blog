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

Route::group([
    'as'        => 'frontend.',
    'namespace' => 'Frontend',
], function () {
    Route::get('', 'FrontendController@index')->name('index');
    Route::get('post/{post}', 'PostController@getPost')->name('post');

    Route::get('contact', 'ContactController@getContact')->name('contact');
    Route::post('send-contact', 'ContactController@postContact')->name('contact.send');
});

Route::get('set-locale/{locale}', 'Frontend\FrontendController@setLocale')->name('set.locale');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
