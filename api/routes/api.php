<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/banks', 'BankController@getBanks');
Route::post('/bank', 'BankController@addBank');
Route::delete('/bank/{bankId}', 'BankController@deleteBank');
Route::put('/bank/{bankId}', 'BankController@updateBank');

Route::get('/cards', 'CardController@getCards');
Route::post('/card/{bankId}', 'CardController@addCard');
Route::delete('/card/{cardId}', 'CardController@deleteCard');
Route::put('/card/{cardId}','CardController@updateCard');


Route::post('/bill/{cardId}', 'BillController@addBill');
Route::delete('/bill/{billId}', 'BillController@deleteBill');
Route::put('/bill/{billId}', 'BillController@updateBill');