<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class ApiCreatorController extends Controller
{


    public function view()
    {
        return view('travel/travelCreator');
    }



}
