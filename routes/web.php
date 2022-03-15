<?php

use App\Http\Controllers\CrudController;
use App\Models\CrudModel;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[CrudController::class,'index'])->name('home')->middleware('check');
Route::get('/addUser',[CrudController::class,'adduser'])->name('adduser')->middleware('check');
Route::post('/saveUser',[CrudController::class,'saveUser'])->name('saveUser')->middleware('check');
Route::get('/getUser/{id}',[CrudController::class,'getUser'])->name('getUser')->middleware('check');
Route::put('/editUser',[CrudController::class,'editUser'])->name('editUser')->middleware('check');
Route::delete('/deleteUser/{id}',[CrudController::class,'deleteUser'])->name('deleteUser')->middleware('check');
Route::get('/login',[CrudController::class,"login"])->name('login')->middleware('already');
Route::get('/register',[CrudController::class,'register'])->name('register')->middleware('already');
Route::post('/checklogin',[CrudController::class,'checklogin'])->name('checklogin')->middleware('already');
Route::post('/saveregister',[CrudController::class,'saveregister'])->name('saveregister')->middleware('already');
Route::get('/logout',[CrudController::class,'logout'])->name('logout');
