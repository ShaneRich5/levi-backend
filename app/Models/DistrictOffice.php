<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictOffice extends Model
{
    protected $fillable = [
        'name'
    ];

    public function churches() {
        return $this->hasMany('\App\Models\Church');
    }

    public function nationalOffice() {
        return $this->belongsTo('App\Models\NationalOffice');
    }
}
