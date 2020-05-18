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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

	Route::name('store_post_path')->post('/posts', 'PostController@store');

	Route::name('create_post_path')->get('/posts/create', 'PostController@create');

	Route::name('edit_post_path')->get('/posts/{post}/edit', 'PostController@edit');

	Route::name('update_post_path')->put('/posts/{post}', 'PostController@update');

	Route::name('delete_post_path')->delete('/posts/{post}', 'PostController@delete');

	Route::name('comment_post_path')->post('/posts/{post}/comment', 'PostCommentController@create');

});

Route::name('tyc')->get('/tyc/{app_name}', 'LegalController@getTermsCondicions');

Route::name('pdp')->get('/pdp', 'LegalController@getPrivacyPolicy');

Route::name('home_a')->get('/home', 'PostController@posts');

Route::name('home_b')->get('/', 'PostController@posts');

Route::name('posts_path')->get('/posts', 'PostController@posts');

Route::name('post_detail_path')->get('/posts/{post}', 'PostController@postdetail');