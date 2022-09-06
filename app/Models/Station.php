<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model {
    use HasFactory;

    protected $fillable = ['name'];

    public function measurands() {
        return $this->hasMany(Measurand::class);
    }

    public function unitcount() {
        return $this->measurands->count();
    }

    public function totalgeneration() {
        $totalgeneration = 0;

        foreach ($this->measurands as $measurand) {
            foreach ($measurand->readings as $reading) {
                $totalgeneration += $reading->value;
            }
        }

        return $totalgeneration;
    }
}
