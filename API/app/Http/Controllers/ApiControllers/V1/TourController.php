<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Travel;

class TourController extends Controller
{
    public function index(Travel $travel)
    {
        return [];
    }
}
