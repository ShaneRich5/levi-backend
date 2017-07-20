<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street', 'parish', 'country'
    ];

    public function organizations() {
        return $this->belongsToMany('App\Models\Organization');
    }
}
