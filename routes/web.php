<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('index');
});

Route::get('/questions', [QuestionController::class, 'index']);

Route::get('/tags', [TagController::class, 'index']);
Route::get('/tag/{tag:name}', [TagController::class, 'show']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');