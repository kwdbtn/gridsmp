<?php

namespace App\Http\Controllers;

use App\Charts\StationUnitChart;
use App\Models\Station;
use App\Models\SystemData;
use Illuminate\Http\Request;

class StationController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generation() {
        $stations = Station::where('type', 'Generation')->orderBy('name')->get();
        $name     = "Generation Stations";
        return view('stations.index', compact('stations', 'name'));
    }

    public function transmission() {
        $stations = Station::where('type', 'transmission')->orderBy('name')->get();
        $name     = "Transmission Stations";
        return view('stations.index', compact('stations', 'name'));
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
    public function show_generation(Station $station) {
        $readings  = SystemData::where('name', strtoupper($station->name))->latest()->limit(10)->get()->reverse();
        $mreadings = $readings->pluck('value', 'update_time');

        $keys = [];

        foreach ($mreadings->keys() as $key) {
            array_push($keys, \Carbon\Carbon::parse(date("H:i:s", $key))->format("H:i"));
        }

        $chart         = new StationUnitChart;
        $chart->labels = ($keys);
        $chart->title('Plant Generation');

        $chart->dataset('Readings', 'line', $mreadings->values())
            ->backgroundColor('rgba(238, 41, 41, 0.4)');
        return view('stations.show', compact('station', 'chart'));
    }

    public function show_transmission(Station $station) {

        // -------------------------------------------------------- MW -----------------------------------------------------------------------------------------------------

        $mwreadings      = $station->transmission_station_data->where('unit', "MW")->toQuery()->latest()->limit(10)->get()->reverse();
        $mwchartReadings = $mwreadings->pluck('value', 'update_time');

        $keysMW = [];

        foreach ($mwchartReadings->keys() as $key) {
            array_push($keysMW, \Carbon\Carbon::parse(date("H:i:s", $key))->format("H:i"));
        }

        $chartMW         = new StationUnitChart;
        $chartMW->labels = ($keysMW);

        $chartMW->dataset('Station Load (MW)', 'line', $mwchartReadings->values())
            ->backgroundColor('rgba(238, 41, 41, 0.4)');

        // -------------------------------------------------------- MVAR -----------------------------------------------------------------------------------------------------

        $mvarreadings      = $station->transmission_station_data->toQuery()->where('unit', "MVAR")->orWhere('name', 'MVar')->latest()->limit(10)->get()->reverse();
        $mvarchartReadings = $mvarreadings->pluck('value', 'update_time');

        $keysMVAR = [];

        foreach ($mvarchartReadings->keys() as $key) {
            array_push($keysMVAR, \Carbon\Carbon::parse(date("H:i:s", $key))->format("H:i"));
        }

        $chartMVAR         = new StationUnitChart;
        $chartMVAR->labels = ($keysMVAR);

        $chartMVAR->dataset('Station Load (MVAR)', 'line', $mvarchartReadings->values())
            ->backgroundColor('rgba(238, 41, 41, 0.4)');

        return view('stations.transmission', compact('station', 'mwreadings', 'mvarreadings', 'chartMW', 'chartMVAR'));
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
