<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class Expense extends Model
{
    use SyncsWithFirebase;
    
    protected $fillable = [
        'name', 'amount', 'description'
    ];

    public function districtReport() {
        return $this->belongsTo('App\Models\DistrictReport');
    }
}
