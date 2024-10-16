<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/menu_available/{id}', [App\Http\Controllers\MenuController::class, 'setMenuAvailable'])->name('menuAvailable');
