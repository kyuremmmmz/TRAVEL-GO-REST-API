<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest2;
use App\Http\Resources\TourResource;
use App\Models\tours;
use App\Models\Travel;
use Illuminate\Http\Request;


class TourController extends Controller
{
    public function index(Travel $travel, Request $request)
    {
        //DOCUMENTTTTT
        //TODO: STUDY THIS CODE

        //EXPLANATION: This code means that the when is called before the tour is executed amd it will execute the price
        $tours = $travel->tours()
                ->when($request->priceFrom, function($query) use ($request)
                {
                    $query->where('price', '>=', $request->priceFrom * 100 );
                })
                ->when($request->priceTo, function($query) use ($request)
                {
                    $query->where('price', '<=', $request->priceTo * 100 );
                })
                ->when($request->dateFrom, function($query) use ($request)
                {
                    $query->where('starting_date', '>=', $request->dateFrom );
                })
                ->when($request->dateTo, function($query) use ($request)
                {
                    $query->where('ending_date', '<=', $request->dateTo  );
                })
                ->when($request->sortBy && $request->sortOrder, function($query) use ($request)
                {
                    if (!in_array($request->sortOrder, ['asc', 'desc'])) return;
                    $query->orderBy($request->sortBy, $request->sortOrder);
                })
                ->when($request->all(), function($query) use ($request){
                    if (!in_array($query->all(), ['desc', 'asc'])) {
                            return response()->json([
                                'message'=>'order not found'
                            ])->setStatusCode(404);


                    }
                })
                ->orderBy('starting_date')
                ->paginate();
                return TourResource::collection($tours);
    }


    public function store( TourRequest2 $request)
    {
        $tour =  tours::create($request->validated());
        return new TourResource($tour);
    }

    public function update(TourRequest2 $request, tours $tour)
    {
        $tour->tours()->create($request->validated());
        return new TourResource($tour);
    }

    public function Tignan()
    {
        return view('Tour.TourResources');
    }
}
