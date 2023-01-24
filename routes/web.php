<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ProductsController;

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
    return view('Users.Add');
});
Route::get('/routelist', function () {
    return view('Routes.List');
});
Route::get('/addroute', function () {
    return view('Routes.add');
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
Route::get('/products_edit/{id}',[ProductsController::class,'edit']);
Route::post('/products_update/{id}',[ProductsController::class,'update']);
Route::get('/products_delete/{id}',[ProductsController::class,'destroy']);