<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTransmissionStationData extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('transmission_station_data', function (Blueprint $table) {
            $table->string('name');
            $table->string('value');
            $table->string('unit');
            $table->integer('update_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('transmission_station_data', function (Blueprint $table) {
            //
        });
    }
}
