<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VoteController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/questions', [QuestionController::class, 'index']);
Route::get('/questions/create', [QuestionController::class, 'create'])->middleware('auth');

Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->can('edit', 'question');
Route::put('/questions/{question}', [QuestionController::class, 'update'])->middleware('auth')->can('update', 'question');

Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->middleware('auth')->can('delete', 'question');

Route::get('/questions/{question}', [QuestionController::class, 'show']);

Route::post('/questions', [QuestionController::class, 'store'])->middleware('auth');


Route::get('/tags', [TagController::class, 'index']);
Route::get('/tag/{tag:name}', [TagController::class, 'show']);

Route::post('/answers', [AnswerController::class, 'store'])->middleware('auth');

Route::post('/comments', [CommentController::class, 'store'])->middleware('auth');

Route::post('/votes', [VoteController::class, 'store'])->middleware('auth');
Route::put('/votes', [VoteController::class, 'update'])->middleware('auth');
Route::delete('/votes', [VoteController::class, 'destroy'])->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login');
});

Route::get('/profiles/{user}', [RegisteredUserController::class, 'show'])->middleware('auth');
Route::get('/profiles/{user}/edit', [RegisteredUserController::class, 'edit'])->middleware('auth')->can('edit', 'user');
Route::put('/profiles/{user}', [RegisteredUserController::class, 'update'])->middleware('auth')->can('update', 'user');
Route::delete('/profiles/{user}', [RegisteredUserController::class, 'destroy'])->middleware('auth')->can('delete', 'user');

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');