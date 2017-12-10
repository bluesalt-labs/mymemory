<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => 'auth:api', 'prefix' => 'user'], function() {
    Route::get('/', function (Request $request) {
        return Auth::user();
        //return $request->session()->get('key');
    });
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'todo_list'], function() {
    Route::get('/', function (Request $request) {

    });
});

    //return json_encode('{{ "Hello": "World" }}');
    //Route::resource('post', 'APIController');
    //return Auth::guard('api')->user();
    //return $request->user();

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
