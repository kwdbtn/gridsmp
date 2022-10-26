<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model {
    use HasFactory;

    protected $fillable = ['station_unit_id', 'value', 'unit', 'update_time'];

    public function station_unit() {
        return $this->belongsTo(StationUnit::class);
    }
}
