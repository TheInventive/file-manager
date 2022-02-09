<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileUploadController;
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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');
Route::post('/getmsg/{category_id}',[WelcomeController::class, 'indexFiles']);
Route::post('/setsubcat/{category_id}',[WelcomeController::class, 'indexSubCategories']);
Route::post('/getsiblings/{category_id}',[WelcomeController::class, 'indexSiblings']);

Route::post("/file-upload",[FileUploadController::class,'fileUploadPost'])->name('file.upload.post');
Route::post("/new-category",[CategoryController::class,'create']);
Route::get("/file-download/{file_name}",[FileUploadController::class,'fileDownloadPost'])->name('file.download.post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
