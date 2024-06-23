<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Http\Controllers\Controller;
use App\Models\tours;
use App\Models\Travel;
use Illuminate\Http\Request;

class ViewTable extends Controller
{
    public function index(Travel $travel)
    {
        $data = $travel->orderBy('name', 'asc')->get();

        return view('tablesView.tables', compact('data'));
    }

    public function delete(Travel $travel, tours $tour)
    {


        $travel->delete();

        return redirect(route('tableview'))->with('success','Deleted successfully!');
    }
}
