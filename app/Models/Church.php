<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function districtOffice()
    {
        return $this->belongsTo('App\Models\DistrictOffice');
    }

    public function churchReports()
    {
        return $this->hasMany('App\Models\ChurchReport');
    }
}
