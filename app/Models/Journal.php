<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $appends = ['title'];

    protected function getTitleAttribute() {
        return $this->report()->first()->toArray()['title'];
    }

    public function report()
    {
        return $this->morphOne('App\Models\Report', 'reportable');
    }

    public function nationalOffice()
    {
        return $this->belongsTo('App\Models\NationalOffice');
    }

    public function districtReports()
    {
        return $this->hasMany('App\Models\DistrictReport');
    }

    public function churchReports()
    {
        return $this->hasManyThrough('App\Models\ChurchReport', 'App\Models\DistrictReport');
    }
}
