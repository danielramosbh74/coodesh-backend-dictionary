<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(
        [
        'message' => 'Fullstack Challenge 🏅 - Dictionary'
        ],
        200
    );
});
