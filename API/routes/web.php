<?php

use App\Http\Controllers\ApiControllers\V1\Admin\TravelController;
use App\Http\Controllers\ApiControllers\V1\ApiCreatorController;
use App\Http\Controllers\ApiControllers\V1\Auth\LoginController;
use App\Http\Controllers\ApiControllers\V1\TourController;
use App\Http\Controllers\ApiControllers\V1\ViewTable;
use Illuminate\Support\Facades\Route;



Route::get('v1/travel', [TravelController::class, 'index'])->name('travel');
Route::get('v1/travel/{travel:slug}/Tour', [TourController::class, 'index']);
Route::get('travel/travelCreator', [ApiCreatorController::class, 'view'])->name('view');
Route::get('tablesView/table', [ViewTable::class,'index'])->name('tableview');
Route::delete('tablesView/table/{travel}', [ViewTable::class, 'Delete'])->name('destroy');



Route::post('v1/admin/TravelController', [TravelController::class, 'createTours'])->name('Creator');

Route::post('login', [LoginController::class, '__invoke']);
Route::get('index/csrftoken', [LoginController::class, 'csrf']);
Route::post('v1/travel/TourController', [TourController::class, 'store'])->name('ToursCreate');
Route::get('Tour/TourResources', [TourController::class, 'Tignan'])->name('view');
Route::post('v1/ApiControllers/TravelController/{travel:name}', [TravelController::class, 'update'])->name('Update');
Route::get('TourTables/TourTable', [TourController::class, 'tables'])->name('viewTables');
