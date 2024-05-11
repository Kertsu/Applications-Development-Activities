<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/task-1', function () {
    # SELECT * FROM students;
    $students = DB::table('students')->get();
    return response()->json($students);
});

Route::get('/task-2', function () {
    // SELECT * FROM students WHERE grade = '10';
    $students = DB::table('students')->where('grade', 10)->get();
    return response()->json($students);
});

Route::get('/task-3', function () {
    // SELECT * FROM students WHERE age BETWEEN 15 AND 18;
    $students = DB::table('students')->where('age', '>=', 15, 'and', '<=', 18)->get();
    return response()->json($students);
});

Route::get('/task-4', function () {
    // SELECT * FROM students WHERE city = 'Manila';
    $students = DB::table('students')->where('city', 'Manila')->get();
    return response()->json($students);
});

Route::get('/task-5', function () {
    // SELECT * FROM students ORDER BY age DESC;
    $students = DB::table('students')->orderBy('age', 'desc')->get();
    return response()->json($students);
});

Route::get('/task-6', function () {
    // SELECT students.*, teachers.name AS teacher_name FROM students LEFT JOIN teachers ON students.teacher_id = teachers.id;
    $students = DB::table('students')
        ->leftJoin('teachers','students.teacher_id', '=', 'teachers.id')
        ->select('students.*', 'teachers.name AS teacher_name')
        ->get();
    return response()->json($students);
});
