<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Centre_Point;
use App\Models\Locations;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function centrepoint()
    {
        $centrepoint = Centre_Point::latest()->get();
        return datatables()->of($centrepoint)
            ->addColumn('action', 'backend.CentrePoint.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function locations()
    {
        $locations = Locations::latest()->get();
        return datatables()->of($locations)
            ->addColumn('action', 'backend.Locations.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
}
