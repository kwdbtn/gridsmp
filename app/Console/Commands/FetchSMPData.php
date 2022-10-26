<?php

namespace App\Console\Commands;

use App\Models\StationUnit;
use App\Models\SystemData;
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

        $systemData = DB::connection('smp_conn')->select('select * from id_descr where groupname = "1. System Data" or groupname = "2. Plant Generation" or groupname = "4. Voltages"');

        foreach ($systemData as $data) {
            SystemData::create([
                'name'        => $data->IDTEXT,
                'unit'        => $data->UNIT,
                'value'       => $data->value,
                'update_time' => $data->time_update,
            ]);
        }

        $this->info('SMP data fetched!');
    }
}
