<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model {
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function station_units() {
        return $this->hasMany(StationUnit::class);
    }

    public function unitcount() {
        return $this->station_units->count();
    }

    public function totalgeneration() {
        $totalgeneration = 0;

        foreach ($this->station_units as $station_unit) {
            $totalgeneration += $station_unit->readings->last()->value;
        }

        return round($totalgeneration, 2);
    }

    public function transmission_station_data() {
        return $this->hasMany(TransmissionStationData::class);
    }
}
