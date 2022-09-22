<?php

namespace App\Http\Controllers;

use App\Models\SystemData;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        // $results = DB::connection('smp_conn')->select('select * from id_descr');

        // foreach ($results as $result) {
        //     // dd($result->IDTEXT);
        //     $measurand = Measurand::where('name', $result->IDTEXT)->first();

        //     if (!is_null($measurand)) {
        //         // dd($measurand);

        //         $measurand->readings()->create([
        //             'value' => $result->value,
        //             'unit' => $result->UNIT,
        //         ]);
        //     }
        // $systemData = DB::connection('smp_conn')->select('select * from id_descr where groupname = "1. System Data"');
        $systemData = DB::connection('smp_conn')->select('select time_update from id_descr');

        // foreach ($systemData as $data) {
        //     dd(date('Y-m-d H:i:s', strtotime($data->time_update)));
        // }
        dd(date("Y-m-d H:i:s", $systemData[0]->time_update));
        // }

        // dd($results);
        return view('home');
    }

    public function dashboard() {
        $arr = [
            'system_frequency' => SystemData::where('name', 'System Frequency')->latest()->limit(1)->get()->last(),
            'system_generation' => SystemData::where('name', 'System Generation')->latest()->limit(1)->get()->last(),
            'tema_gas' => SystemData::where('name', 'Tema Gas Pressure')->latest()->limit(1)->get()->last(),
            'thermal_generation' => SystemData::where('name', 'Total Thermal Generation')->latest()->limit(1)->get()->last(),
            'hydro_generation' => SystemData::where('name', 'Total Hydro Generation')->latest()->limit(1)->get()->last(),
            'Asogli' => SystemData::where('name', 'Asogli')->latest()->limit(1)->get()->last(),
            'TAPCO' => SystemData::where('name', 'TAPCO')->latest()->limit(1)->get()->last(),
            'TICO' => SystemData::where('name', 'TICO')->latest()->limit(1)->get()->last(),
            'TT1PP' => SystemData::where('name', 'TT1PP')->latest()->limit(1)->get()->last(),
            'CENIT' => SystemData::where('name', 'CENIT')->latest()->limit(1)->get()->last(),
            'TT2PP' => SystemData::where('name', 'TT2PP')->latest()->limit(1)->get()->last(),
            'KARPOWER' => SystemData::where('name', 'KARPOWER')->latest()->limit(1)->get()->last(),
            'Ameri' => SystemData::where('name', 'Ameri')->latest()->limit(1)->get()->last(),
            'AKSA' => SystemData::where('name', 'AKSA')->latest()->limit(1)->get()->last(),
            'KTPP' => SystemData::where('name', 'KTPP')->latest()->limit(1)->get()->last(),
            'Akosombo' => SystemData::where('name', 'Akosombo')->latest()->limit(1)->get()->last(),
            'Kpong' => SystemData::where('name', 'Kpong')->latest()->limit(1)->get()->last(),
            'Bui' => SystemData::where('name', 'Kpong')->latest()->limit(1)->get()->last(),
            'CIE' => SystemData::where('name', 'CIE Exchange')->latest()->limit(1)->get()->last(),
            'CEB(161KV)' => SystemData::where('name', 'CEB 161KV Load')->latest()->limit(1)->get()->last(),
            'CEB(330KV)' => SystemData::where('name', 'CEB 330KV Load')->latest()->limit(1)->get()->last(),
            'SONABEL' => SystemData::where('name', 'SONABEL LOAD')->latest()->limit(1)->get()->last(),
        ];

        return view('dashboard', compact('arr'));
    }
}
