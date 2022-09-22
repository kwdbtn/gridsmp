<?php

namespace App\Http\Controllers;

use App\Charts\MeasurandChart;
use App\Models\Station;
use App\Models\SystemData;
use Illuminate\Http\Request;

class StationController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $stations = Station::orderBy('name')->get();
        // $colors   = ['D0F1ED', 'D0F1ED', 'D0F1ED', 'C1ECE7', 'B1E7E1', 'A1E2DB', '92DDD5', '82D9CF', '69D1C5', '63CFC2', '53CABC', '44C5B6', '3ABBAC', '35AC9E', '309C8F', '2B8C81', '267D73', '226D64', '1D5E56', '184E48', '133E39'];
        // return view('stations.index', compact('stations', 'colors'));
        return view('stations.index', compact('stations'));
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
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station) {
        $readings = SystemData::where('name', strtoupper($station->name))->latest()->limit(10)->get()->reverse();
        $mreadings = $readings->pluck('value', 'update_time');

        $keys = [];

        foreach ($mreadings->keys() as $key) {
            array_push($keys, \Carbon\Carbon::parse(date("H:i:s", $key))->format("H:i"));
        }

        $chart = new MeasurandChart;
        $chart->labels = ($keys);
        $chart->title('Plant Generation');

        $chart->dataset('Readings', 'line', $mreadings->values())
            ->backgroundColor('rgba(238, 41, 41, 0.4)');
        return view('stations.show', compact('station', 'chart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station) {
        //
    }
}
