<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreVehicleTypeRequest;
use App\Http\Requests\UpdateVehicleTypeRequest;
use App\VehicleType;

class VehicleTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehicle-type.index');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleTypeRequest $request)
    {
        $response=[];
        try {
            $vt = new VehicleType;
            $vt->name = $request->name;
            $vt->description = $request->description;
            $vt->save();

            $response['status'] = TRUE;
            $response['message'] = 'Vehicle Type has been created';
            
        } catch (Exception $e) {
            return $e;
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleTypeRequest $request, $id)
    {
        $response=[];
        
        try {
            $vt = VehicleType::findOrFail($id);
            $vt->name = $request->name;
            $vt->description = $request->description;
            $vt->save();

            $response['status'] = TRUE;
            $response['message'] = 'Vehicle Type has been updated';
            
        } catch (Exception $e) {
            return $e;
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response=[];
        
        try {
            $vt = VehicleType::findOrFail($id);
            $vt->delete();

            $response['status'] = TRUE;
            $response['message'] = 'Vehicle Type has been deleted';
            
        } catch (Exception $e) {
            return $e;
        }
        return response()->json($response);
    }
}
