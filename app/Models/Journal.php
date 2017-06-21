<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'title'
    ];

    public function nationalOffice() {
        return $this->belongsTo('App\Models\NationalOffice');
    }

    public function districtReports() {
        return $this->hasMany('\App\Models\DistrictReport');
    }
}
