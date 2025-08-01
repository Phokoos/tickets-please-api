<?php

use App\Http\Controllers\Api\V1\AuthorTicketController;
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\AuthorsController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::resource('tickets', TicketController::class)->except('update');
    Route::put('tickets/{ticket}', [TicketController::class, 'replace']);
    Route::patch('tickets/{ticket}', [TicketController::class, 'update']);

    Route::resource('users', UserController::class)->except('update');
    Route::put('users/{user}', [UserController::class, 'replace']);
    Route::patch('users/{user}', [UserController::class, 'update']);

    Route::resource('authors', AuthorsController::class)->except(['store', 'update', 'destroy']);
    Route::resource('authors.tickets', AuthorTicketController::class)->except('update');
    Route::put('authors/{author}/tickets/{ticket}', [AuthorTicketController::class, 'replace']);
    Route::patch('authors/{author}/tickets/{ticket}', [AuthorTicketController::class, 'update']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

