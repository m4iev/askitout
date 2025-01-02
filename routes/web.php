<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/questions', [QuestionController::class, 'index']);
Route::get('/questions/create', [QuestionController::class, 'create'])->middleware('auth');

Route::get('/questions/{question}', [QuestionController::class, 'show']);
Route::post('/questions', [QuestionController::class, 'store'])->middleware('auth');

Route::get('/tags', [TagController::class, 'index']);
Route::get('/tag/{tag:name}', [TagController::class, 'show']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::get('/profiles/{user}', [RegisteredUserController::class, 'show'])->middleware('auth');
Route::get('/profiles/{user}/edit', [RegisteredUserController::class, 'edit'])->middleware('auth');
Route::patch('/profiles/{user}', [RegisteredUserController::class, 'update'])->middleware('auth');
Route::delete('/profiles/{user}', [RegisteredUserController::class, 'destroy'])->middleware('auth');

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');