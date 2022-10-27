<?php

namespace App\Http\Controllers;

use App\Charts\StationUnitChart;
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

    public function summary() {
        $arr = [
            'system_frequency'   => SystemData::where('name', 'System Frequency')->latest()->limit(1)->get()->last(),
            'system_generation'  => SystemData::where('name', 'System Generation')->latest()->limit(1)->get()->last(),
            'tema_gas'           => SystemData::where('name', 'Tema Gas Pressure')->latest()->limit(1)->get()->last(),
            'thermal_generation' => SystemData::where('name', 'Total Thermal Generation')->latest()->limit(1)->get()->last(),
            'hydro_generation'   => SystemData::where('name', 'Total Hydro Generation')->latest()->limit(1)->get()->last(),
            'Asogli'             => SystemData::where('name', 'Asogli Generation')->latest()->limit(1)->get()->last(),
            'TAPCO'              => SystemData::where('name', 'TAPCO Generation')->latest()->limit(1)->get()->last(),
            'TICO'               => SystemData::where('name', 'TICO Generation')->latest()->limit(1)->get()->last(),
            'TT1PP'              => SystemData::where('name', 'TT1PP Generation')->latest()->limit(1)->get()->last(),
            'CENIT'              => SystemData::where('name', 'CENIT Generation')->latest()->limit(1)->get()->last(),
            'TT2PP'              => SystemData::where('name', 'TT2PP Generation')->latest()->limit(1)->get()->last(),
            'KARPOWER'           => SystemData::where('name', 'KarPower Generation')->latest()->limit(1)->get()->last(),
            'Ameri'              => SystemData::where('name', 'Ameri  Generation')->latest()->limit(1)->get()->last(),
            'AKSA'               => SystemData::where('name', 'Aksa Generation')->latest()->limit(1)->get()->last(),
            'KTPP'               => SystemData::where('name', 'KTPP Generation')->latest()->limit(1)->get()->last(),
            'Akosombo'           => SystemData::where('name', 'Akosombo Generation')->latest()->limit(1)->get()->last(),
            'Kpong'              => SystemData::where('name', 'Kpong Generation')->latest()->limit(1)->get()->last(),
            'Bui'                => SystemData::where('name', 'Bui Generation')->latest()->limit(1)->get()->last(),
            'CIE'                => SystemData::where('name', 'CIE Exchange')->latest()->limit(1)->get()->last(),
            'CEB(161KV)'         => SystemData::where('name', 'CEB 161KV Load')->latest()->limit(1)->get()->last(),
            'CEB(330KV)'         => SystemData::where('name', 'CEB 330KV Load')->latest()->limit(1)->get()->last(),
            'SONABEL'            => SystemData::where('name', 'SONABEL LOAD')->latest()->limit(1)->get()->last(),
            'volta_bus'          => SystemData::where('name', 'Volta Bus')->latest()->limit(1)->get()->last(),
            'cenpower'           => SystemData::where('name', 'Cenpower Generation')->latest()->limit(1)->get()->last(),
            'amandi'             => SystemData::where('name', 'Amandi Generation')->latest()->limit(1)->get()->last(),
            'bridge_power'       => SystemData::where('name', 'Bridge Power Generation')->latest()->limit(1)->get()->last(),
            'net_export'         => SystemData::where('name', 'NET GHANA EXPORT')->latest()->limit(1)->get()->last(),
            'kaleo_solar_mw'     => SystemData::where('name', 'KALEO SOLAR MW')->latest()->limit(1)->get()->last(),
            'bui_solar_mw'       => SystemData::where('name', 'BUI SOLAR MW')->latest()->limit(1)->get()->last(),
        ];

        $vra         = SystemData::where('name', 'Total VRA Generation')->latest()->limit(20)->get()->reverse();
        $vraReadings = $vra->pluck('value', 'update_time');

        $keys = [];

        foreach ($vraReadings->keys() as $key) {
            array_push($keys, \Carbon\Carbon::parse(date("H:i:s", $key))->format("H:i"));
        }

        $ipp         = SystemData::where('name', 'Total IPP Generation')->latest()->limit(20)->get();
        $ippReadings = $ipp->pluck('value', 'update_time');

        $chart         = new StationUnitChart;
        $chart->labels = ($keys);

        $chart->dataset('VRA (MW)', 'line', $vraReadings->values())
            ->options(['borderColor' => 'rgba(255, 41, 41, 0.8)'])
            ->options(['borderWidth' => '5'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(255, 41, 41, 0)');

        $chart->dataset('IPP (MW)', 'line', $ippReadings->values())
            ->options(['borderColor' => 'green'])
            ->options(['borderWidth' => '4'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(41, 255, 244, 0)');

        return view('dashboard', compact('arr', 'chart'));
    }

    public function generation_profile() {
        $chart = new StationUnitChart;

        $thermal         = SystemData::where('name', 'Total Thermal Generation')->latest()->limit(10)->get()->reverse();
        $thermalReadings = $thermal->pluck('value', 'update_time');

        $keys = [];

        foreach ($thermalReadings->keys() as $key) {
            array_push($keys, \Carbon\Carbon::parse(date("H:i:s", $key))->format("H:i"));
        }

        $hydro         = SystemData::where('name', 'Total Hydro Generation')->latest()->limit(10)->get();
        $hydroReadings = $hydro->pluck('value', 'update_time');

        $systemGeneration         = SystemData::where('name', 'System Generation')->latest()->limit(10)->get();
        $systemGenerationReadings = $systemGeneration->pluck('value', 'update_time');

        $chart         = new StationUnitChart;
        $chart->labels = ($keys);

        $chart->dataset('Thermal (MW)', 'line', $thermalReadings->values())
            ->options(['borderColor' => 'rgba(255, 41, 41, 0.8)'])
            ->options(['borderWidth' => '5'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(255, 41, 41, 0)');

        $chart->dataset('Hydro (MW)', 'line', $hydroReadings->values())
            ->options(['borderColor' => 'rgba(41, 255, 244, 0.8)'])
            ->options(['borderWidth' => '4'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(41, 255, 244, 0)');

        $chart->dataset('System Generation (MW)', 'line', $systemGenerationReadings->values())
            ->options(['borderColor' => 'rgba(5, 5, 5, 0.8)'])
            ->options(['borderWidth' => '4'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(5, 5, 5, 0)');

        return view('generationProfile', compact('chart'));
    }

    public function voltage_profile() {

        $volta161         = SystemData::where('name', 'Volta Bus')->latest()->limit(10)->get()->reverse();
        $volta161Readings = $volta161->pluck('value', 'update_time');

        $keys = [];

        foreach ($volta161Readings->keys() as $key) {
            array_push($keys, \Carbon\Carbon::parse(date("H:i:s", $key))->format("H:i"));
        }

        $volta330         = SystemData::where('name', 'VOLTA 330 BUS VOLTAGE')->latest()->limit(10)->get();
        $volta330Readings = $volta330->pluck('value', 'update_time');

        $aboadze161         = SystemData::where('name', 'ABOADZE 161 BUS VOLTAGE')->latest()->limit(10)->get();
        $aboadze161Readings = $aboadze161->pluck('value', 'update_time');

        $aboadze330         = SystemData::where('name', 'ABOADZE 330 BUS VOLTAGE')->latest()->limit(10)->get();
        $aboadze330Readings = $aboadze330->pluck('value', 'update_time');

        $anwomaso161         = SystemData::where('name', 'ANWOMASO 161 BUS VOLTAGE')->latest()->limit(10)->get();
        $anwomaso161Readings = $anwomaso161->pluck('value', 'update_time');

        $anwomaso330         = SystemData::where('name', 'ANWOMASO 330 BUS VOLTAGE')->latest()->limit(10)->get();
        $anwomaso330Readings = $anwomaso330->pluck('value', 'update_time');

        $kumasi         = SystemData::where('name', 'Kumasi Bus')->latest()->limit(10)->get();
        $kumasiReadings = $kumasi->pluck('value', 'update_time');

        $nayagnia225         = SystemData::where('name', 'Nayagnia 225 BUS')->latest()->limit(10)->get();
        $nayagnia225Readings = $nayagnia225->pluck('value', 'update_time');

        $nayagnia330         = SystemData::where('name', 'NAYAGNIA 330 BUS VOLTAGE')->latest()->limit(10)->get();
        $nayagnia330Readings = $nayagnia330->pluck('value', 'update_time');

        $chart         = new StationUnitChart;
        $chart->labels = ($keys);

        $chart->dataset('Volta 161', 'line', $volta161Readings->values())
            ->options(['borderColor' => 'rgba(255, 41, 41, 0.8)'])
            ->options(['borderWidth' => '5'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(255, 41, 41, 0)');

        $chart->dataset('Volta 330', 'line', $volta330Readings->values())
            ->options(['borderColor' => 'rgba(41, 255, 244, 0.8)'])
            ->options(['borderWidth' => '4'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(41, 255, 244, 0)');

        $chart->dataset('Aboadze 161', 'line', $aboadze161Readings->values())
            ->options(['borderColor' => 'gray'])
            ->options(['borderWidth' => '4'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(5, 5, 5, 0)');

        $chart->dataset('Aboadze 330', 'line', $aboadze330Readings->values())
            ->options(['borderColor' => 'rgba(5, 5, 5, 0.8)'])
            ->options(['borderWidth' => '4'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(240, 36, 36, 0)');

        $chart->dataset('Anwomaso 161', 'line', $anwomaso161Readings->values())
            ->options(['borderColor' => 'yellow'])
            ->options(['borderWidth' => '4'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(5, 5, 5, 0)');

        $chart->dataset('Anwomaso 330', 'line', $anwomaso330Readings->values())
            ->options(['borderColor' => 'purple'])
            ->options(['borderWidth' => '4'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(5, 5, 5, 0)');

        $chart->dataset('Kumasi', 'line', $kumasiReadings->values())
            ->options(['borderColor' => 'orange'])
            ->options(['borderWidth' => '4'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(5, 5, 5, 0)');

        $chart->dataset('Nayagnia 225', 'line', $nayagnia225Readings->values())
            ->options(['borderColor' => 'blue'])
            ->options(['borderWidth' => '4'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(5, 5, 5, 0)');

        $chart->dataset('Nayagnia 330 (kV)', 'line', $nayagnia330Readings->values())
            ->options(['borderColor' => 'green'])
            ->options(['borderWidth' => '4'])
            ->options(['pointHoverRadius' => '5'])
            ->backgroundColor('rgba(5, 5, 5, 0)');

        return view('voltageProfile', compact('chart'));
    }
}
