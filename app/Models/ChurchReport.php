<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChurchReport extends Model
{
    protected $fillable = [];

    protected $appends = ['title'];

    protected function getTitleAttribute() {
        return $this->report()->first()->toArray()['title'];
    }

    public function church() {
        return $this->belongsTo('App\Models\Church');
    }

    public function districtReport() {
        return $this->belongsTo('App\Models\DistrictReport');
    }

    public function report()
    {
        return $this->morphOne('App\Models\Report', 'reportable');
    }

    public function sources() {
        return $this->hasMany('\App\Models\Source');
    }

    public function total() {
        return $this->sources()->sum('amount') / 100;
    }
}
