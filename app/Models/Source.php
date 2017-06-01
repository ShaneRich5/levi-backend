<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class Source extends Model
{
    use SyncsWithFirebase;
    
    protected $fillable = [
        'name', 'amount', 'description'
    ];

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value * 100;
    }

    public function getAmountAttribute($value)
    {
        return $value / 100;
    }

    protected function churchReport() {
        return $this->belongsTo('App\Models\ChurchReport');
    }
}
