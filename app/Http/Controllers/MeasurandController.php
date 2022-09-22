<?php

namespace App\Http\Controllers;

use App\Charts\MeasurandChart;
use App\Models\Measurand;
use Illuminate\Http\Request;

class MeasurandController extends Controller {
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
     * @param  \App\Models\Measurand  $measurand
     * @return \Illuminate\Http\Response
     */
    public function show(Measurand $measurand) {

        $readings = $measurand->readings()->latest()->limit(10)->get()->reverse();
        $mreadings = $readings->pluck('value', 'update_time');

        $keys = [];

        foreach ($mreadings->keys() as $key) {
            array_push($keys, \Carbon\Carbon::parse(date("H:i:s", $key))->format("H:i"));
        }

        $chart = new MeasurandChart;
        $chart->labels = ($keys);

        $chart->dataset('Readings', 'line', $mreadings->values())
            ->backgroundColor('rgba(238, 41, 41, 0.4)');

        return view('measurands.show', compact('measurand', 'readings', 'chart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Measurand  $measurand
     * @return \Illuminate\Http\Response
     */
    public function edit(Measurand $measurand) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Measurand  $measurand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measurand $measurand) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Measurand  $measurand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measurand $measurand) {
        //
    }
}
