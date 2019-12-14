
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
    return view('hstw-welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/perfil', 'HomeController@profile')->name('profile');
Route::get('/gestion-de-clientes', 'HomeController@customers')->name('customers');



Route::get('/reporte-prestamos', 'HomeController@reportLoans')->name('reportLoans');
Route::get('/reporte-prestamos-cliente/{id}', 'HomeController@reportLoanPdf')->name('printpdf');

Route::get('/calcular-prestamo', 'HomeController@computedloan')->name('computedLoan');
Route::get('/calcular-prestamo-pdf', 'HomeController@downloadPDF')->name('prfReport');


Route::get('/asignar-tarjeta-cliente', 'HomeController@assignCard')->name('setCard');
Route::post('/asignar-tarjeta-cliente', 'HomeController@saveCard')->name('setCard');
Route::get('/set-state/{id}/{status}', 'HomeController@setState')->name('setStatus');


Route::get('/verificar-buro-cliente', 'HomeController@checkCustomer')->name('checkCustomer');


Route::get('/asignar-prestamo-cliente', 'HomeController@assignLoan')->name('setloan');
Route::post('/asignar-prestamo-cliente', 'HomeController@saveLoan')->name('setloan');

Route::post('/updateUser/{id}', 'HomeController@updateUser')->name('updateUser');
Route::post('/storeCustomer', 'HomeController@storeCustomer')->name('storeCustomer');
Route::post('/updateCustomer', 'HomeController@updateCustomer')->name('updateCustomer');

Route::get('/deleteCustomer/{id}', 'HomeController@removeCustomer')->name('deleteCustomer');


Route::get('/', function () {
    return view('hstw-welcome');
})->name('publications');
