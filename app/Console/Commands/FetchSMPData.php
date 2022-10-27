<?php

namespace App\Console\Commands;

use App\Models\StationUnit;
use App\Models\SystemData;
use App\Models\TransmissionStationData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FetchSMPData extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:smp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch SMP data from SMP database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $results = DB::connection('smp_conn')->select('select * from id_descr');

        foreach ($results as $result) {
            $stationUnit = StationUnit::where('name', $result->IDTEXT)->first();

            if (!is_null($stationUnit)) {
                $stationUnit->readings()->create([
                    'value'       => $result->value,
                    'unit'        => $result->UNIT,
                    'update_time' => $result->time_update,
                ]);
            }
        }

        $systemData = DB::connection('smp_conn')->select('select * from id_descr where groupname = "1. System Data" or groupname = "2. Plant Generation" or groupname = "4. Voltages" or groupname = "8. Station Loads" or groupname = "9. Station Loads"');

        foreach ($systemData as $data) {
            SystemData::create([
                'name'        => $data->IDTEXT,
                'unit'        => $data->UNIT,
                'value'       => $data->value,
                'update_time' => $data->time_update,
            ]);

            if ($data->IDTEXT == "Akosombo Load MW" || $data->IDTEXT == "Akosombo Load MVAR" || $data->IDTEXT == "Akosombo Bus" || $data->IDTEXT == "Akosombo Feeder") {
                TransmissionStationData::create([
                    'station_id'  => 21,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "VOLTA 161 kW" || $data->IDTEXT == "VOLTA 161 kVAR" || $data->IDTEXT == "Volta Bus" || $data->IDTEXT == "VOLTA 161 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 22,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "VOLTA 330 MW" || $data->IDTEXT == "VOLTA 330 MVAR" || $data->IDTEXT == "VOLTA 330 BUS VOLTAGE" || $data->IDTEXT == "VOLTA 330 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 23,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == " Achimota" || $data->IDTEXT == "Achimota " || $data->IDTEXT == "ACHIMOTA BUS VOLTAGE" || $data->IDTEXT == "Achimota Feeder") {
                TransmissionStationData::create([
                    'station_id'  => 24,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "POKUASE MW" || $data->IDTEXT == "POKUASE MVAR" || $data->IDTEXT == "POKUASE BUS VOLTAGE" || $data->IDTEXT == "POKUASE FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 25,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "Mallam" || $data->IDTEXT == " Mallam" || $data->IDTEXT == "MALLAM BUS VOLTAGE" || $data->IDTEXT == "Mallam Feeder") {
                TransmissionStationData::create([
                    'station_id'  => 26,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "ACCRA CENTRAL MW" || $data->IDTEXT == "ACCRA CENTRAL MVAR" || $data->IDTEXT == "ACCRA CENTRAL BUS VOLTAGE" || $data->IDTEXT == "ACCRA CENTRAL FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 27,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "Accra East" || $data->IDTEXT == "Accra  East" || $data->IDTEXT == "ACCRA EAST BUS VOLTAGE" || $data->IDTEXT == "ACCRA EAST FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 28,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "KASOA MW" || $data->IDTEXT == "KASOA MVAR" || $data->IDTEXT == "KASOA BUS VOLTAGE" || $data->IDTEXT == "KASOA FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 29,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "SMELTER2 MW" || $data->IDTEXT == "SMELTER2 MVAR" || $data->IDTEXT == "SMELTER2 BUS VOLTAGE" || $data->IDTEXT == "SMELTER 2 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 30,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == " Takoradi" || $data->IDTEXT == "Takoradi " || $data->IDTEXT == "TAKORADI BUS VOLTAGE" || $data->IDTEXT == "Takoradi Feeder") {
                TransmissionStationData::create([
                    'station_id'  => 31,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == " Kumasi" || $data->IDTEXT == "Kumasi " || $data->IDTEXT == "Kumasi Bus" || $data->IDTEXT == "Kumasi Feeder") {
                TransmissionStationData::create([
                    'station_id'  => 32,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "ANWOMASO 330 MW" || $data->IDTEXT == "ANWOMASO 330 MVAR" || $data->IDTEXT == "ANWOMASO 330 BUS VOLTAGE" || $data->IDTEXT == "ANWOMASO 330 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 33,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "ANWOMASO 161 MW" || $data->IDTEXT == "ANWOMASO 161 MVAR" || $data->IDTEXT == "ANWOMASO 161 BUS VOLTAGE" || $data->IDTEXT == "ANWOMASO 161 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 34,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == " Tamale" || $data->IDTEXT == "Tamale " || $data->IDTEXT == "TAMALE BUS VOLTAGE" || $data->IDTEXT == "Tamale Feeder") {
                TransmissionStationData::create([
                    'station_id'  => 35,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "ABOADZE 330 MW" || $data->IDTEXT == "ABOADZE 330 MVAR" || $data->IDTEXT == "ABOADZE 330 BUS VOLTAGE" || $data->IDTEXT == "ABOADZE 330 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 36,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "NAYAGNIA 330 MW" || $data->IDTEXT == "NAYAGNIA 330 MVAR" || $data->IDTEXT == "NAYAGNIA 330 BUS VOLTAGE" || $data->IDTEXT == "NAYGNIA 330 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 37,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "NAYAGNIA 225 MW" || $data->IDTEXT == "NAYAGNIA 225 MVAR" || $data->IDTEXT == "Nayagnia 225 BUS" || $data->IDTEXT == "NAYGNIA 225 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 38,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "DAWA MW" || $data->IDTEXT == "DAWA MVAR" || $data->IDTEXT == "DAWA BUS VOLTAGE" || $data->IDTEXT == "DAWA FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 39,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "PRESTEA 225 MW" || $data->IDTEXT == "PRESTEA 225 MVAR" || $data->IDTEXT == "Prestea 225 Bus" || $data->IDTEXT == "PRESTEA 225 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 40,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "ASIEKPE MW" || $data->IDTEXT == "ASIEKPE MVAR" || $data->IDTEXT == "Asiekpe Bus" || $data->IDTEXT == "ASIEKPE FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 41,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "AFLAO MW" || $data->IDTEXT == "AFLAO MVAR" || $data->IDTEXT == "AFLAO BUS VOLTAGE" || $data->IDTEXT == "AFLAO FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 42,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "KINTAMPO 330 MW" || $data->IDTEXT == "KINTAMPO 330 MVAR" || $data->IDTEXT == "Kintampo 330KV Bus" || $data->IDTEXT == "KINTAMPO 330 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 43,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "KINTAMPO 161 MW" || $data->IDTEXT == "KINTAMPO 161 MVAR" || $data->IDTEXT == "KINTAMPO 161 BUS VOLTAGE" || $data->IDTEXT == "KINTAMPO 161 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 44,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "ADUBIYILI 330 MW" || $data->IDTEXT == "ADUBIYILI 330 MVAR" || $data->IDTEXT == "ADUBIYILI 330 BUS VOLTAGE" || $data->IDTEXT == "ADUBIYILI 330 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 45,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "TARKWA MW" || $data->IDTEXT == "TARKWA MVAR" || $data->IDTEXT == "TARKWA BUS VOLTAGE" || $data->IDTEXT == "TARKWA FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 46,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "DUNKWA MW" || $data->IDTEXT == "DUNKWA MVAR" || $data->IDTEXT == "DUNKWA BUS VOLTAGE" || $data->IDTEXT == "DUNKWA FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 47,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            } else if ($data->IDTEXT == "ABOADZE 161 MW" || $data->IDTEXT == "ABOADZE 161 MVAR" || $data->IDTEXT == "ABOADZE 161 BUS VOLTAGE" || $data->IDTEXT == "ABOADZE 161 FEEDER VOLTAGE") {
                TransmissionStationData::create([
                    'station_id'  => 48,
                    'name'        => $data->IDTEXT,
                    'unit'        => $data->UNIT,
                    'value'       => $data->value,
                    'update_time' => $data->time_update,
                ]);
            }
        }

        $this->info('SMP data fetched!');
    }
}
