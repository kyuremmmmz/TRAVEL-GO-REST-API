<?php

use App\Http\Controllers\ApiControllers\V1\ApiCreatorController;
use App\Http\Controllers\ApiControllers\V1\TourController;
use App\Http\Controllers\ApiControllers\V1\TravelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('v1/travel', [TravelController::class, 'index'])->name('travel');
Route::get('v1/travel/{travel:slug}/Tour', [TourController::class, 'index']);
Route::get('travel/travelCreator', [ApiCreatorController::class, 'view'])->name('view');
Route::post('v1/ApiCreatorController', [ApiCreatorController::class, 'createTours'])->name('Create');
Route::put('v1/ApiCreatorController/{update}', [ApiCreatorController::class, 'update'])->name('Update');
