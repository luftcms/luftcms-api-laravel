<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->group(function () {
   Route::apiResource('users', 'UserController');
   Route::apiResource('items', 'ItemController');
   Route::apiResource('item_tags', 'ItemTagController');
   Route::apiResource('tags', 'TagController');
   Route::apiResource('type', 'TypeController');
   Route::apiResource('type', 'TypeController');

});