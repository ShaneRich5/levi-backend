<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    public function districtOffice()
    {
        return $this->belongsTo('App\Models\DistrictOffice');
    }
}
