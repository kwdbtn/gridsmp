<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransmissionStationData extends Model {
    use HasFactory;

    protected $fillable = ['station_id', 'name', 'value', 'unit', 'update_time'];

    public function station() {
        return $this->belongsTo(Station::class);
    }
}
