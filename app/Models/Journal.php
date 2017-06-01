<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class Journal extends Model
{
    use SyncsWithFirebase;
    
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
