<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurand extends Model {
    use HasFactory;

    protected $fillable = ['station_id', 'name'];

    public function station() {
        return $this->belongsTo(Station::class);
    }

    public function readings() {
        return $this->hasMany(Reading::class);
    }

    public function current() {
        return $this->readings->last()->value . '' . $this->readings->last()->measurement;
    }
}
