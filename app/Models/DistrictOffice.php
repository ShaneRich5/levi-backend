<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictOffice extends Model
{
    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function nationalOffice()
    {
        return $this->belongsTo('App\Models\NationalOffice');
    }

    public function districtReports()
    {
        return $this->hasMany('App\Models\DistrictReport');
    }

    public function churches()
    {
        return $this->hasMany('App\Models\Church');
    }
}
