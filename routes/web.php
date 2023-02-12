<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SalesorderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReturnToInventoryController;
use App\Http\Controllers\StockController;
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
Route::get('/userlist', function () {
    return view('Users.List');
});
Route::get('/adduser', function () {
    return view('Users.add');
});
Route::get('/routelist', function () {
    return view('Routes.List');
});
Route::get('/addroute', function () {
    return view('Routes.add');
});
Route::get('/customerlist', function () {
    return view('Customers.List');
});
Route::get('/addcustomer', function () {
    return view('Customers.add');
});
Route::get('/addpo', function () {
    return view('PO.add');
});
Route::get('/polist', function () {
    return view('PO.List');
});
Route::get('/stock', function () {
    return view('ReturntoStock.addstock');
});
Route::get('/stocklist', function () {
    return view('Stock.stocklist');
});

// =================================brands==========================================================
Route::get('/brands', [App\Http\Controllers\BrandsController::class,'index'])->name('brands.index');
Route::get('/brands_add', [App\Http\Controllers\BrandsController::class,'create'])->name('brands.create');
Route::post('/brands/add/store', [App\Http\Controllers\BrandsController::class,'store'])->name('brands.store');    
Route::get('/brands_edit{id}', [App\Http\Controllers\BrandsController::class,'edit'])->name('brands.edit');
Route::put('/brands_update/{id}', [App\Http\Controllers\BrandsController::class,'update'])->name('brands.update');    
Route::get('/brands_delete/{id}', [App\Http\Controllers\BrandsController::class,'destroy'])->name('brands.delete');   

// =================================users==========================================================

Route::post('/userlist',[AdminController::class,'store']);
Route::get('/userlist',[AdminController::class,'show']);
Route::get('/userupdate{id}',[AdminController::class,'edit']);
Route::post('/userupdate',[AdminController::class,'update']);
Route::get('/userdelete/{id}',[AdminController::class,'destroy']);


// =================================routes==========================================================

Route::post('/routelist',[RouteController::class,'store']);
Route::get('/routelist',[RouteController::class,'show']);
Route::get('/routeupdate{id}',[RouteController::class,'edit']);
Route::post('/routeupdate',[RouteController::class,'update']);
Route::get('/routedelete/{id}',[RouteController::class,'destroy']);

// =======================================products===========================================================

Route::get('/products',[ProductsController::class,'index']);
Route::get('/products_add',[ProductsController::class,'create']);
Route::post('/products_store',[ProductsController::class,'store']);
Route::get('/products_edit{id}',[ProductsController::class,'edit']);
Route::put('/products_update/{id}',[ProductsController::class,'update']);
Route::get('/products_delete/{id}',[ProductsController::class,'destroy']);
// =================================customers==========================================================

Route::get('/addcustomer',[CustomerController::class,'index']);
Route::post('/customerlist',[CustomerController::class,'store']);
Route::get('/customerlist',[CustomerController::class,'show']);
Route::get('/customerupdate{id}',[CustomerController::class,'edit']);
Route::post('/customerupdate',[CustomerController::class,'update']);
Route::get('/customerdelete/{id}',[CustomerController::class,'destroy']);
// =================================PO==================================================================

Route::get('/addpo',[PurchaseOrderController::class,'index']);
Route::post('/polist',[PurchaseOrderController::class,'store']);
Route::get('/polist',[PurchaseOrderController::class,'show']);
Route::get('/poupdate{po_no}',[PurchaseOrderController::class,'edit']);
Route::post('/poupdate',[PurchaseOrderController::class,'update']);
Route::get('/podelete/{po_no}',[PurchaseOrderController::class,'destroy']);

//======================================SO================================================================

Route::get('/sales',[SalesorderController::class,'index']);
Route::post('/addso',[SalesorderController::class,'store']);
Route::get('/solist',[SalesorderController::class,'show']);
Route::get('/soedit{so_no}',[SalesorderController::class,'edit']);
Route::post('/soupdate/{so_no}',[SalesorderController::class,'update']);
//======================================Inventory================================================================

Route::get('/stock',[ReturnToInventoryController::class,'index']);
Route::post('/add_stock',[ReturnToInventoryController::class,'store']);


//======================================Stock================================================================

Route::get('/stocklist',[StockController::class,'show']);