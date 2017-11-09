<?php

namespace App\Http\Controllers;

use App\GasStation;
use Illuminate\Http\Request;

class GasStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gas_station');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required',
            'cep' => 'required',
            'address' => 'required',
            'number' => 'required',
            'maps_google' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'user_id' => 'required'
        ]);

        $gasStation = new GasStation();
        $gasStation->name = $request->name;
        $gasStation->cep = $request->cep;
        $gasStation->address = $request->address;
        $gasStation->number = $request->number;
        $gasStation->maps_google = $request->maps_google;
        $gasStation->city_id = $request->city_id;
        $gasStation->state_id = $request->state_id;
        $gasStation->user_id = $request->user_id;
        
        try {
            $saved = $gasStation->save();
            return view('success');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
