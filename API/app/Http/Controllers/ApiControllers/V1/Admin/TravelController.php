<?php

namespace App\Http\Controllers\ApiControllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelRequest;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index(Request $request)
    {
        $data = Travel::where('is_public', true)->paginate();
        return TravelResource::collection($data);
    }

    public function createTours(TravelRequest $request, Travel $travell)
    {
        $tr = $travell->create($request->validated());
        return new TravelResource($tr);

    }

    public function update(TravelRequest $request, Travel $travel)
    {
        $travel->update($request->validated());
        return redirect(route('tableview', compact('travel')))->with('success','Updated Successfully!');
    }

}


