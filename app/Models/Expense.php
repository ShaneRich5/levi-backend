<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'name', 'amount', 'description'
    ];

    public function districtReport() {
        return $this->belongsTo('App\Models\DistrictReport');
    }
}
