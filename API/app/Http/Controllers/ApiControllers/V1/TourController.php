<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TourResource;
use App\Models\Travel;

class TourController extends Controller
{
    public function index(Travel $travel)
    {
        $tours = $travel->tours()->orderBy('starting_date')->paginate();
        return TourResource::collection($tours);
    }
}
