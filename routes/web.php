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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HardwareController@searchHardware');
Route::get('/searchUser', 'HardwareController@searchUser');
Route::get('/inventory', 'HardwareController@inventory');
Route::get('/deployed', 'HardwareController@deployed');
Route::get('/device/{id}', 'HardwareController@showDevice');
/* Deliveries*/
Route::get('/deliveries', 'HardwareController@deliveries');
/*Sort Delivery*/
Route::get('/deliveries/warranty/asc', 'HardwareController@deliveriesSortByWarrantyASC');
Route::get('/deliveries/warranty/desc', 'HardwareController@deliveriesSortByWarrantyDESC');
Route::get('/deliveries/purchased-date/asc', 'HardwareController@deliveriesSortByPurchasedDateASC');
Route::get('/deliveries/purchased-date/desc', 'HardwareController@deliveriesSortByPurchasedDateDESC');
/*Sort Inventory*/
Route::get('/inventory/warranty/asc', 'HardwareController@inventorySortByWarrantyASC');
Route::get('/inventory/warranty/desc', 'HardwareController@inventorySortByWarrantyDESC');
Route::get('/inventory/purchased-date/asc', 'HardwareController@inventorySortByPurchasedDateASC');
Route::get('/inventory/purchased-date/desc', 'HardwareController@inventorySortByPurchasedDateDESC');
/*Sort Deployed*/
Route::get('/deployed/warranty/asc', 'HardwareController@deployedSortByWarrantyASC');
Route::get('/deployed/warranty/desc', 'HardwareController@deployedSortByWarrantyDESC');
Route::get('/deployed/purchased-date/asc', 'HardwareController@deployedSortByPurchasedDateASC');
Route::get('/deployed/purchased-date/desc', 'HardwareController@deployedSortByPurchasedDateDESC');
Route::get('/deployed/deployed-date/asc', 'HardwareController@deployedSortByDeployedDateASC');
Route::get('/deployed/deployed-date/desc', 'HardwareController@deployedSortByDeployedDateDESC');
/* store data */
Route::post('add/deliveries/excel', 'HardwareController@importExcel');
Route::post('add/deployed/excel', 'HardwareController@importExcelDeployed');
Route::post('single', 'HardwareController@singleDelivery');
Route::post('singleDeployed', 'HardwareController@singleDeployed');

/* Edit data */
Route::put('edit/delivery/{id}', 'HardwareController@editDelivery');
Route::put('add/edit/delivery/{id}', 'HardwareController@editDelivery');
Route::put('in/delivery/{id}', 'HardwareController@InDelivery');
Route::put('deliver/{id}', 'HardwareController@putDeviceOnDelivery');
Route::put('out/delivery/{id}', 'HardwareController@OutDelivery');
Route::put('in/all', 'HardwareController@InAllSelected');
Route::put('delivery/all', 'HardwareController@DeliveryAllSelected');
/* Delete data */
Route::delete('/delete/delivery/{id}', 'HardwareController@deleteDelivery');
Route::delete('delete/all', 'HardwareController@deleteAllSelected');
