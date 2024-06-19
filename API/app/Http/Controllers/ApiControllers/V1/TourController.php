<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TourResource;
use App\Models\Travel;
use Illuminate\Http\Request;


class TourController extends Controller
{
    public function index(Travel $travel, Request $request)
    {
        $request->validate([
            "priceFrom"=> "numeric|required",
            'priceTo'=> 'numeric|required',
            'dateFrom'=>'numeric|required',
            ''=> '',
        ]);
        //DOCUMENTTTTT
        //TODO: STUDY THIS CODE
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
                ->orderBy('starting_date')
                ->paginate();
                return TourResource::collection($tours);
    }
}
