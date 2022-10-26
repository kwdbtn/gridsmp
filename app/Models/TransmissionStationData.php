<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransmissionStationData extends Model {
    use HasFactory;

    protected $fillable = ['station_id', 'mv', 'mvar', 'hv_bus_voltage', 'lv_bus_voltage'];

    public function Station() {
        return $this->belongsTo(TransmissionStationData::class);
    }
}
