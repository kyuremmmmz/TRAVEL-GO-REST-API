<?php

use App\Http\Controllers\ApiControllers\V1\ApiCreatorController;
use App\Http\Controllers\ApiControllers\V1\Auth\LoginController;
use App\Http\Controllers\ApiControllers\V1\TourController;
use App\Http\Controllers\ApiControllers\V1\TravelController;
use App\Http\Controllers\ApiControllers\V1\ViewTable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('v1/travel', [TravelController::class, 'index'])->name('travel');
Route::get('v1/travel/{travel:slug}/Tour', [TourController::class, 'index']);
Route::get('travel/travelCreator', [ApiCreatorController::class, 'view'])->name('view');
Route::put('v1/ApiCreatorController/{update}', [TravelController::class, 'update'])->name('Update');
Route::get('tablesView/table', [ViewTable::class,'index'])->name('tableview');
Route::delete('tablesView/table/{travel:number_of_days}', [ViewTable::class, 'Delete'])->name('destroy');



Route::prefix('admin')->middleware('auth:sanctum')->group(function (){
    Route::post('travels', [TravelController::class, 'createTours'])->name('Create');
});


Route::post('login', [LoginController::class, '__invoke'])->name('login');
Route::post('v1/travel/TourController', [TourController::class, 'store'])->name('ToursCreate');
Route::get('Tour/TourResources', [TourController::class, 'Tignan'])->name('view');
Route::put('v1/TourController/{id}', [TourController::class, 'update'])->name('update');

