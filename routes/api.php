<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'auth:sanctum'], function()
{
Route::get("list/{id?}",[AddressController::class,'list']);
Route::post("add",[AddressController::class,'add']);
Route::put("update/{id}",[AddressController::class,'update']);
Route::get("search/{country}",[AddressController::class,'search']);
Route::delete("delete/{id}",[AddressController::class, 'delete']);

    });


//Route::get("data",[StudentController::class,'getData']);

//Route::apiResource("list",[AddressController::class]);
Route::get("login",[UserController::class,'login']);


