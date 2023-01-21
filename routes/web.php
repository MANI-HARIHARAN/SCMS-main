<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
// Route::get('/useredit', function () {
//     return view('Users.Update');
// });

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
// Route::post('/orgUpdate',[organizationcontroller::class,'update']);
// Route::get('/orgDelete/{id}',[organizationcontroller::class,'delete']);
// Route::get('/empsearch',[organizationcontroller::class, 'searchemp']);