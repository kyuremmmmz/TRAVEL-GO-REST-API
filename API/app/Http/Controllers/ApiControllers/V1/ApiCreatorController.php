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

    //TODO: Implement update method and integrate the UI for that method
    public function update(Request $request, Travel $travel)
    {
        $data = $request->validate([
            'name' =>'required|string',
            'description' =>'required|string',
            'price' =>'required|integer',
            'number_of_days'=>'required|integer',
            'is_public' =>'required|boolean',
        ]);


        $update = $travel->update($data);

        return redirect(route('travel', compact('update')));
    }

}
