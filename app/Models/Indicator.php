<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $fillable = [
        'name', 'value'
    ];

    public function indicatorTypes() {
        return $this->belongsToMany('App\Models\IndicatorType');
    }
}
