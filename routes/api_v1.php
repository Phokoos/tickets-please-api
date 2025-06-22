<?php

use App\Http\Controllers\Api\V1\AuthorTicketController;
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\AuthorsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->resource('tickets', TicketController::class);
Route::middleware('auth:sanctum')->resource('authors', AuthorsController::class);
Route::middleware('auth:sanctum')->resource('authors.tickets', AuthorTicketController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
