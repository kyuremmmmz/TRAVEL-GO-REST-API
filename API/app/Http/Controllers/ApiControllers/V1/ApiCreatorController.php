<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Http\Controllers\Controller;
use App\Models\tours;
use App\Models\Travel;
use Illuminate\Http\Request;

class ApiCreatorController extends Controller
{
    public function createTours(Request $request, Travel $travel)
    {
        $travels = $request->validate([
            'name' =>'required|string',
            'description' =>'required|string',
            'price' =>'required|integer',
            'number_of_days'=>'required|integer',
            'is_public' =>'required|boolean',
        ]);

        $travel->create($travels);

<<<<<<< HEAD
        return dd($request->$tours->orderBy('name', 'asc')->get());
=======
        return redirect(route('travel'));

>>>>>>> 64f0cdec4b8c7dd5a41663363079d7680e4190b2
    }

    public function view()
    {
        return view('travel/travelCreator');
    }
}
