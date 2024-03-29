<?php

namespace App\Http\Controllers;

use App\Charts\StationUnitChart;
use App\Models\StationUnit;
use Illuminate\Http\Request;

class StationUnitController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StationUnit  $stationUnit
     * @return \Illuminate\Http\Response
     */
    public function show(StationUnit $stationUnit) {

        $readings = $stationUnit->readings()->latest()->limit(10)->get()->reverse();
        $mreadings = $readings->pluck('value', 'update_time');

        $keys = [];

        foreach ($mreadings->keys() as $key) {
            array_push($keys, \Carbon\Carbon::parse(date("H:i:s", $key))->format("H:i"));
        }

        $chart = new StationUnitChart;
        $chart->labels = ($keys);

        $chart->dataset('Readings', 'line', $mreadings->values())
            ->backgroundColor('rgba(238, 41, 41, 0.4)');

        return view('stationUnit.show', compact('stationUnit', 'readings', 'chart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StationUnit  $stationUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(StationUnit $stationUnit) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StationUnit  $stationUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StationUnit $stationUnit) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StationUnit  $stationUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(StationUnit $stationUnit) {
        //
    }
}
