<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FloorController;

use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'home']);


// floor manage
Route::get('/floors', [FloorController::class, 'viewFloors']);
Route::post('/add-floor', [FloorController::class, 'addFloor']);


Route::get('/rooms', [FloorController::class, 'viewRooms']);

