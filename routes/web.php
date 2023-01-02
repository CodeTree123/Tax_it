<?php

use App\Http\Controllers\AdminController;
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

Route::get('/',[AdminController::class,'index'])->name('index');
Route::post('/login',[AdminController::class,'login'])->name('login');
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/user',[AdminController::class,'user_list'])->name('user.list');
Route::get('/products/add',[AdminController::class,'product_add'])->name('product.add');
Route::get('/products',[AdminController::class,'product_list'])->name('product.list');
Route::post('/product/create',[AdminController::class,'product_create'])->name('product.create');
Route::get('/products/edit/{id}',[AdminController::class,'product_edit'])->name('product.edit');
Route::put('/products/update/{id}',[AdminController::class,'product_update'])->name('product.update');
Route::get('/products/delete/{id}',[AdminController::class,'product_delete'])->name('product.delete');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');