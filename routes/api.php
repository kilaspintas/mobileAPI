<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Controller;

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

//show data
Route::get('notes', [Controller::class,'index']);

//create data
Route::post('notes/create', [dataNotesController::class,'store']);

//edit data
Route::post('notes/update/{id}', [dataNotesController::class,'update']);

//delete data
Route::get('notes/delete/{id}', [dataNotesController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
