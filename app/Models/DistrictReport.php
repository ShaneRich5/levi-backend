<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class DistrictReport extends Model
{
    use SyncsWithFirebase;
    
    protected $fillable = [
        'title'
    ];

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
}
