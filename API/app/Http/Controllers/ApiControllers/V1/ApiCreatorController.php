<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Http\Controllers\Controller;
use App\Models\tours;
use Illuminate\Http\Request;

class ApiCreatorController extends Controller
{
    public function createTours(Request $request, tours $tours)
    {
        $tour = $request->validate([
            'name' =>'name',
            'description' =>'description',
            'price' =>'price',
            'is_public' =>'required|boolean|true',
        ]);

        $tours->create($tour);

        return redirect(route('Create'));

    }
}
