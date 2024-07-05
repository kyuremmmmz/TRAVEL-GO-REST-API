<?php

use App\Http\Controllers\ApiControllers\V1\Admin\TravelController;
use App\Http\Controllers\ApiControllers\V1\ApiCreatorController;
use App\Http\Controllers\ApiControllers\V1\Auth\LoginController;
use App\Http\Controllers\ApiControllers\V1\TourController;
use App\Http\Controllers\ApiControllers\V1\ViewTable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('v1/travel', [TravelController::class, 'index'])->name('travel');
Route::get('v1/travel/{travel:slug}/Tour', [TourController::class, 'index']);
Route::get('travel/travelCreator', [ApiCreatorController::class, 'view'])->name('view');
Route::get('tablesView/table', [ViewTable::class,'index'])->name('tableview');
Route::delete('tablesView/table/{travel}', [ViewTable::class, 'Delete'])->name('destroy');
Route::put('tablesView/table/{travel:id}', [TravelController::class, 'update'])->name('Update');




Route::post('v1/TravelController', [TravelController::class, 'createTours'])->name('Create');

Route::prefix('admin')->middleware('auth:sanctum')->group(function (){
    Route::post('login', [LoginController::class, '__invoke'])->name('login');
});


Route::post('login', [LoginController::class, '__invoke'])->name('login');
=======
>>>>>>> d15075b4e06acb5a6df981cf85da664335a3133c
