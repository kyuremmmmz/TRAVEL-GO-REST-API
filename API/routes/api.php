<?php

use App\Http\Controllers\ApiControllers\V1\Admin\TravelController;
use App\Http\Controllers\ApiControllers\V1\ApiCreatorController;
use App\Http\Controllers\ApiControllers\V1\Auth\LoginController;
use App\Http\Controllers\ApiControllers\V1\TourController;
use App\Http\Controllers\ApiControllers\V1\ViewTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('v1/travel', [TravelController::class, 'index'])->name('travel');
Route::get('v1/travel/{travel:slug}/Tour', [TourController::class, 'index']);
Route::get('travel/travelCreator', [ApiCreatorController::class, 'view'])->name('view');
Route::get('tablesView/table', [ViewTable::class,'index'])->name('tableview');
Route::delete('tablesView/table/{travel}', [ViewTable::class, 'Delete'])->name('destroy');


Route::prefix('admin')->group(function ()
{
    Route::post('travels', [TravelController::class, 'createTours'])->name('Create');
});

Route::get('index/csrftoken', [LoginController::class, 'csrf']);
Route::post('Auth/login/csrf', [LoginController::class, '__invoke'])->middleware('validate_csrf_token');
Route::post('v1/travel/TourController', [TourController::class, 'store'])->name('ToursCreate');
Route::get('Tour/TourResources', [TourController::class, 'Tignan'])->name('view');
Route::post('v1/ApiControllers/TravelController/{travel:name}', [TravelController::class, 'update'])->name('Update');
Route::get('TourTables/TourTable', [TourController::class, 'tables'])->name('viewTables');
