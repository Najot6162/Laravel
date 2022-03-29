<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware' => ['auth:sanctum']],function (){

    Route::get('/posts',[Postcontroller::class,'index']);

    Route::post('/post',[Postcontroller::class,'store']);

    Route::get('/posts/{id}',[Postcontroller::class,'show']);

    Route::put('/posts/{id}',[Postcontroller::class,'update']);

    Route::delete('/posts/{id}',[Postcontroller::class,'destroy']);

    Route::post('/logout',[AuthController::class, 'logout']);

});
