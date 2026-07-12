<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FloorController;

use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'home']);


// floor manage
Route::get('/floors', [FloorController::class, 'viewFloors']);
Route::post('/add-floor', [FloorController::class, 'addFloor']);
Route::post('/update-floor', [FloorController::class, 'updateFloor']);
Route::get('/delete-floor/{id}', [FloorController::class, 'deleteFloor']);


Route::get('/rooms', [FloorController::class, 'viewRooms']);
Route::post('/add-rooms', [FloorController::class, 'addRooms']);

