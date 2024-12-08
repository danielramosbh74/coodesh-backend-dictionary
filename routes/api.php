<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/status', function () {
    return response()->json(
        [
        'status' => 'Ok',
        'message' => 'API is running'
        ],
        200
    );
});

// Route::get('/', function () {
//     return response()->json(
//         [
//         'message' => 'Fullstack Challenge 🏅 - Dictionary'
//         ],
//         200
//     );
// });

Route::apiResource('words', WordController::class);

// auth routes
Route::post('/login', [AuthController::class, 'login']);
