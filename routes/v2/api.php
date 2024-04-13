<?php

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

Route::any('/auth', function(){
    return response()->json([
        "success" => true,
        "message" => "This route accepts any method" 
    ]);
});

Route::match(['put', 'patch'], '/users/update-profile', function () {
    return response()->json([
        "success" => true,
        "message" => "This route accepts put and patch requests" 
    ]);
});


Route::get('/users', function() {
    $users = array(
        array(
            "id" => 1,
            "username" => "john_doe",
            "email" => "john@example.com",
            "age" => 30,
            "city" => "New York"
        ),
        array(
            "id" => 2,
            "username" => "jane_smith",
            "email" => "jane@example.com",
            "age" => 25,
            "city" => "Los Angeles"
        ),
        array(
            "id" => 3,
            "username" => "bob_jones",
            "email" => "bob@example.com",
            "age" => 35,
            "city" => "Chicago"
        )
    );
    
    return response()->json([
        "success" => true,
        "users" => $users
    ]);
});
Route::post('/users', function(Request $request) {
    
    return response()->json([
        "success" => true,
        "message" => "POST request received"
    ]);
});
Route::patch('/users/{user}', function(Request $request) {
    
    return response()->json([
        "success" => true,
        "message" => "PATCH request received" 
    ]);
});
Route::put('/users/{user}', function(Request $request) {
    
    return response()->json([
        "success" => true,
        "message" => "PUT request received" 
    ]);
});
Route::delete('/users/{user}', function(Request $request) {
    
    return response()->json([
        "success" => true,
        "message" => "DELETE request received" 
    ]);
});


