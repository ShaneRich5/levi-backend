<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictReport extends Model
{
    protected $fillable = [
        'opening_fund'
    ];

    protected $appends = ['title', 'church_reports'];

    protected function getChurchReportsAttribute() {
        return $this->churchReports()->get()->pluck('id');
    }

    protected function getTitleAttribute() {
        return $this->report()->first()->toArray()['title'];
    }

    public function report()
    {
        return $this->morphOne('App\Models\Report', 'reportable');
    }

    public function districtOffice() {
        return $this->belongsTo('App\Models\DistrictOffice');
    }

    public function journal() {
        return $this->belongsTo('App\Models\Journal');
    }

    public function churchReports() {
        return $this->hasMany('\App\Models\ChurchReport');
    }

    public function expenses() {
        return $this->hasMany('\App\Models\Expense');
    }

    public function sources() {
        return $this->hasManyThrough('App\Models\Source', 'App\Models\ChurchReport');
    }
}
