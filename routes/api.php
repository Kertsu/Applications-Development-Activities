<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('extract.token')->group(function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('/posts', 'index');
        Route::get('/posts/{post}', 'show');
        Route::post('/posts', 'store');
        Route::put('/posts/{post}', 'update');
        Route::patch('/posts/{post}', 'updateProfile');
        Route::delete('/posts/{post}', 'destroy');
    });
});
