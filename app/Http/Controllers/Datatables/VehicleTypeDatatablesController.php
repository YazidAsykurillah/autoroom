<?php

namespace App\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\VehicleType;
use DataTables;

class VehicleTypeDatatablesController extends Controller
{
    public function index(Request $request)
    {
        $data = VehicleType::query()
            ->select('vehicle_types.*');
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return NULL;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
