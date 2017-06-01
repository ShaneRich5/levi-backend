<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class ChurchReport extends Model
{
    use SyncsWithFirebase;

    protected $fillable = [];

    public function church() {
        return $this->belongsTo('App\Models\Church');
    }

    public function districtReport() {
        return $this->belongsTo('App\Models\DistrictReport');
    }

    public function sources() {
        return $this->hasMany('\App\Models\Source');
    }

    public function total() {
        return $this->sources()->sum('amount') / 100;
    }
}
