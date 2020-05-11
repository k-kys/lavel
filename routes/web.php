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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('login', function() {
//     return view('page.login');
// });
// Route::get('login', 'PageController@login');
// Route::post('login', 'PageController@submitLogin');

Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@login')->name('login');
Route::get('register', 'AuthController@getRegister');
Route::post('register', 'AuthController@register')->name('register');

// Products Route with Restfull
// Route::get('product', 'ProductController@index')->name('product.index');
// Route::get('product/create', 'ProductController@create')->name('product.create');
// Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
// Route::get('product/{id}', 'ProductController@show')->name('product.show');

// Route::post('product', 'ProductController@store')->name('product.store');

// Route::put('product/{id}', 'ProductController@update')->name('product.update');

// Route::delete('product/{id}', 'ProductController@destroy')->name('product.destroy');


// Restful
Route::get('books/dashboard', 'BookController@dashboard')->name('book.dashboard')->middleware('check_has_book');

// Route::get('books2', 'BookController@index2')->name('book.index2')->middleware('auth');
Route::get('books2', [
    'as' => 'book.index2',
    'uses' => 'BookController@index2',
    'middleware' => ['auth'],
]);

Route::get('books', 'BookController@index')->name('book.index');
Route::get('books/create', 'BookController@create')->name('book.create');
Route::get('books/{id}/edit', 'BookController@edit')->name('book.edit');
Route::get('books/{id}', 'BookController@show')->name('book.show');

Route::post('books', 'BookController@store')->name('book.store');

Route::put('books/{id}', 'BookController@update')->name('book.update');

Route::delete('books/{id}/delete', 'BookController@destroy')->name('book.destroy');

// tạo bản ghi trong Authors
// Route::get('test', function(){
//     $author = new \App\Author;
//     $author->name = "Văn Cao";
//     $author->gender = 1;
//     $author->save();
// });
// tạo 3 bản ghi trong Categories
// Route::get('test2', function(){
//     $cate = new \App\Category;
//     $cate->name = "Truyện tranh";
//     $cate->save();
//     $cate = new \App\Category;
//     $cate->name = "Truyện cười";
//     $cate->save();
//     $cate = new \App\Category;
//     $cate->name = "Truyện tiểu thuyết";
//     $cate->save();
// });


// Route::get('test-config', function ($id) {
//     dd(config('app.name'));
// });

Route::get('test-config', function () {
    dd(config('book.status.pending'));
});
