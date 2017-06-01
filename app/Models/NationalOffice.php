<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NationalOffice extends Model
{
    protected $fillable = [
        'name'
    ];

    public function districtOffices() {
        return $this->hasMany('\App\Models\DistrictOffice');
    }

    public function journals() {
        return $this->hasMany('\App\Models\Journal');
    }
}
