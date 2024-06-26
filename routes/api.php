<?php

use App\Http\Controllers\DummyApi;
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

Route::get("data/{id?}",[DummyApi::class,'getdata']);
Route::post("addData", [DummyApi::class, 'addData']);
Route::put("update", [DummyApi::class, 'updatedata']);
Route::get("search/{name}",[DummyApi::class,'searchdata']);
Route::get("CharaSearch/{name}",[DummyApi::class,'CharaSearchData']);
Route::delete("delete/{id}", [DummyApi::class,'deletedata']);