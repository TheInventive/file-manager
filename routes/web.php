<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [WelcomeController::class, 'index']);


Route::post('/get-sub-categories/',[CategoryController::class, 'index'])->middleware('auth');;

Route::post('/get-files-by-category/',[FileController::class, 'index'])->middleware('auth');;
Route::post('/get-files-by-sibling/',[FileController::class, 'indexBySibling'])->middleware('auth');;
Route::post("/file-upload",[FileController::class, 'store'])->middleware('auth');;
Route::get("/file-download/{file_name}",[FileController::class, 'download'])->middleware('auth');;
Route::post("/file-delete",[FileController::class, 'destroy'])->middleware('auth');;

Route::post("/create-category",[CategoryController::class,'store'])->middleware('auth');;
Route::post("/delete-category",[CategoryController::class,'destroy'])->middleware('auth');;


Auth::routes();

Route::get('/home', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');
