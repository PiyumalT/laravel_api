<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{article}', [ArticleController::class, 'show']);
Route::post('articles', [ArticleController::class, 'store']);
Route::put('articles/{article}', [ArticleController::class, 'update']);
Route::delete('articles/{article}', [ArticleController::class, 'delete']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

//create endpoint to http://localhost:8000/api/register to return hello
// Route::post('register', function () {
//     return 'Hello World';
// });

//


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
});

// enable later
// Route::group(['middleware' => 'auth:api'], function() {
//     Route::get('articles', 'ArticleController@index');
//     Route::get('articles/{article}', 'ArticleController@show');
//     Route::post('articles', 'ArticleController@store');
//     Route::put('articles/{article}', 'ArticleController@update');
//     Route::delete('articles/{article}', 'ArticleController@delete');
// });
