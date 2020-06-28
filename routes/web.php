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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewProduct/{id}', 'ProductController@view')->name('product');
Route::any('/products', 'ProductController@index')->name('products');
Route::get('/contact_us', 'HomeController@contact_us')->name('contact_us');
Route::post('/contact_us', 'HomeController@contact_us_form')->name('contact_us_form');
Route::any('/chart', 'ChartController@index')->name('chart')->middleware('verified');
Route::get('/add_to_chart/{id}', 'ChartController@add')->name('chart_add')->middleware('verified');
Route::get('/chart_delete/{id}', 'ChartController@delete')->name('chart_del')->middleware('verified');
Route::get('/chart_delete_all', 'ChartController@delete_all')->name('chart_del')->middleware('verified');
Route::get('/order', 'ChartController@order')->name('order')->middleware('verified');
Route::post('/review', 'ProductController@review')->name('review')->middleware('verified');


Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');
