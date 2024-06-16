<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use Illuminate\Support\Facades\Request;

class TravelController extends Controller
{

    public function index(Request $request)
    {
        $data = Travel::where('is_public', true)->paginate();
        return TravelResource::collection($data);
    }




}
