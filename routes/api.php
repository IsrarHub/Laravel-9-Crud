<?php

use App\Http\Controllers\TestApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/saveUser',[TestApi::class,'store']);
Route::post('/signin',[TestApi::class,'signin']);


// Route::group(['middleware' => ['auth:sanctum']], function () {
    
//     Route::get('/check', function(Request $request) {
//         return auth()->user()->name;
//     });
    
// });

Route::middleware('auth:sanctum')->controller(TestApi::class)->group(function (){
     Route::get('/users','index');
     Route::post('/logout',  'signout');
     Route::get('/user/{id}','show');
     Route::put('/editUser/{id}','update');
     Route::delete('/deleteUser/{id}','destroy');
});
