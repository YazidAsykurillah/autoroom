<?php

namespace App\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Role;
use DataTables;

class RoleDatatablesController extends Controller
{
    public function index()
    {
        $data = Role::where('name','!=', 'Super Admin')
            ->latest()->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    //$btn = '<a href="javascript:void(0)" class="btn btn-primary btn-xs btn-edit">Edit</a>';
                    return NULL;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
