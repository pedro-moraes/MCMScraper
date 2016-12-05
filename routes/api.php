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

Route::get('/user', function (Request $request) {
    echo "got to here";
    die;
    return $request->user();
})->middleware('auth:api');

Route::post('/mcmuser/update',function(Request $request){

    echo "here";
});

Route::get('/mcmuser/get','McmUsersController@get');

Route::post('/usertransactions/add','UserTransactionsController@add');

