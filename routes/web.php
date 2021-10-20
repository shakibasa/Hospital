<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth', 'verified');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctor_view',[AdminController::class,'addview']);

Route::post('/upload_doctor',[AdminController::class,'upload']);

Route::post('/appointment',[HomeController::class,'appointment']);

Route::get('/myappointment',[HomeController::class,'myappointment']);

Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);

Route::get('/showappointment',[AdminController::class,'showappointment']);

Route::get('/approved_appoint/{id}',[AdminController::class,'approved_appoint']);

Route::get('/cancel_appoint/{id}',[AdminController::class,'cancel_appoint']);

Route::get('/showdoctor',[AdminController::class,'showdoctor']);

Route::get('/delete/{id}', [AdminController::class,'delete']);

Route::get('/search', [AdminController::class,'search']);

Route::get('/update_view/{id}', [AdminController::class,'update_view']);

Route::post('/update/{id}', [AdminController::class,'update']);

Route::get('/emailview/{id}', [AdminController::class,'emailview']);

Route::post('/sendemail/{id}', [AdminController::class,'sendemail']);