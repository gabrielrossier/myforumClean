<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ReferenceController;
use App\Http\Controllers\API\ThemeController;
use \App\Http\Controllers\API\TopicController;
use \App\Http\Controllers\API\OpinionController;
use App\Http\Controllers\API\AuthController;

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
Route::get('topics/hot',[TopicController::class,'hotOnes']);

Route::resources([
    'references' => ReferenceController::class,
    'categories' => ThemeController::class,
    'topics' => TopicController::class,
    'messages' => OpinionController::class
]);

Route::get('topics/ofcategory/{id}',[ThemeController::class,'topics']);
Route::get('messages/oftopic/{id}',[TopicController::class,'opinions']);
Route::get('replies/tomessage/{id}',[OpinionController::class,'comments']);
Route::post('trylogin',[AuthController::class,'tryLogin']);
