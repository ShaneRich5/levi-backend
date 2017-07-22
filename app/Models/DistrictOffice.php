<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictOffice extends Model
{
    public function nationalOffice()
    {
        return $this->belongsTo('App\Models\NationalOffice');
    }

    public function churches()
    {
        return $this->hasMany('App\Models\Church');
    }
}
