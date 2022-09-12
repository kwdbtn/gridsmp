<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model {
    use HasFactory;

    protected $fillable = ['measurand_id', 'value', 'unit'];

    public function measurand() {
        return $this->belongsTo(Measurand::class);
    }
}
