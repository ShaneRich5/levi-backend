<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndicatorType extends Model
{
    protected $fillable = ['name', 'description'];

    public function indicators() {
        return $this->belongsToMany('App\Models\Indicator');
    }
}
