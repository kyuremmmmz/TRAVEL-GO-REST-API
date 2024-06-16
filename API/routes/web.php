<?php

use App\Http\Controllers\ApiControllers\V1\TravelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('guard')->group(
    [Route::get('v1/travel', [TravelController::class, 'index'])

    ]
);

