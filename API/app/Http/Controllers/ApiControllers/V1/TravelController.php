<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TourResource;
use App\Models\Travel;
use Illuminate\Support\Facades\Request;

class TravelController extends Controller
{

    public function index(Request $request)
    {
        $data = TourResource::collection(Travel::where('is_public', true)->get());
        return response()->json($data);
    }


}
