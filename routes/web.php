<?php

use App\Http\Controllers\CrudController;
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
Route::get('/',[CrudController::class,'index'])->name('home');
Route::get('/addUser',[CrudController::class,'adduser'])->name('adduser');
Route::post('/saveUser',[CrudController::class,'saveUser'])->name('saveUser');
Route::get('/getUser/{id}',[CrudController::class,'getUser'])->name('getUser');
Route::put('/editUser',[CrudController::class,'editUser'])->name('editUser');
Route::delete('/deleteUser/{id}',[CrudController::class,'deleteUser'])->name('deleteUser');