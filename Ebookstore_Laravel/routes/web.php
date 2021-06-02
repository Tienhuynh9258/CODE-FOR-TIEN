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

Route::get('/', 'BookController@getAllBook')->name('home');

Route::get('about-us', function(){
    return view('about-us');
})->name('about-us');

Route::get('contact-us', function(){
    return view('contact-us');
})->name('contact-us');

Route::get('order-his', function(){
    return view('order-his');
})->name('order-his');

Route::post('login', 'AuthController@login')->name('login');

Route::post('logout', 'AuthController@logout')->name('logout');

Route::post('register', 'AuthController@register')->name('register');

Route::get('admin', function(){
    return view('admin');
})->name('admin');

Route::get('customer-info', 'CustomerController@getCustomerInfo')->name('getCustomerInfo');

Route::post('save-customer-info', 'CustomerController@saveCustomerInfo')->name('saveCustomerInfo');

Route::post('save-import-book', 'AdminController@saveImportBooks')->name('saveImportBooks');

Route::post('save-import-wh', 'AdminController@saveImportWH')->name('saveImportWH');

Route::post('process-trans', 'AdminController@processTransaction')->name('processTransaction');

Route::get('get-all-book-by-cate', 'BookController@getAllByCategory')->name('getAllByCategory');

Route::get('get-all-book-by-author', 'BookController@getAllByAuthor')->name('getAllByAuthor');

Route::get('get-all-book-by-publish-year', 'BookController@getAllByPublishYear')->name('getAllByPublishYear');

Route::get('get-all-author-by-cate', 'BookController@getAllAuthorByCate')->name('getAllAuthorByCate');

Route::get('get-all-book-by-key', 'BookController@getAllByKey')->name('getAllByKey');

Route::post('payment', 'BookController@payment')->name('payment');


Route::get('get-all-isbn', 'AdminController@getAllIsbn')->name('getAllIsbn');

Route::get('get-sum-of-isbn', 'AdminController@getSumOfISBN')->name('getSumOfISBN');

Route::get('get-sum-of-tradi', 'AdminController@getSumOfTradi')->name('getSumOfTradi');

Route::get('get-sum-of-ebook-buy', 'AdminController@getSumOfEbookBuy')->name('getSumOfEbookBuy');

Route::get('get-sum-of-ebook-borrow', 'AdminController@getSumOfEbookBorrow')->name('getSumOfEbookBorrow');

Route::get('get-au-list-date', 'AdminController@getAuListDate')->name('getAuListDate');

Route::get('get-au-list-month', 'AdminController@getAuListMonth')->name('getAuListMonth');

Route::get('get-book-list-month', 'AdminController@getBookListMonth')->name('getBookListMonth');

Route::get('get-view-transaction-credit-day', 'AdminController@getTransactionCreditDay')->name('getTransactionCreditDay');
Route::get('get-error-transaction-day', 'AdminController@getErrorTransactionDay')->name('getErrorTransactionDay');

Route::get('get-wh-have-isbn-less-than-n', 'AdminController@getWHhaveISBNlessthanN')->name('getWHhaveISBNlessthanN');

Route::get('get-wh-export-most', 'AdminController@getWHExportMost')->name('getWHExportMost');

Route::get('get-ds-sach-mua-trong-thang', 'AdminController@getDSSach_MuaTrongThang')->name('getDSSach_MuaTrongThang');

Route::get('get-ds-giao-dich-trong-thang', 'AdminController@getDSSach_GiaoDichTrongThang')->name('getDSSach_GiaoDichTrongThang');

Route::get('get-ds-su-co-trong-thang', 'AdminController@getDSSach_SuCoTrongThang')->name('getDSSach_SuCoTrongThang');

Route::get('get-ds-chua-hoan-thanh', 'AdminController@getDSSach_ChuaHoanThanh')->name('getDSSach_ChuaHoanThanh');

Route::get('get-sum-by-field', 'AdminController@getSumByField')->name('getSumByField');

Route::get('get-transaction-have-most-book', 'AdminController@getTransactionHaveMostBook')->name('getTransactionHaveMostBook');

Route::get('get-transaction-have-both', 'AdminController@getTransactionhaveboth')->name('getTransactionhaveboth');









