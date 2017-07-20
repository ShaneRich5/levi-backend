<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationType extends Model
{
    protected $fillable = ['name', 'description'];

    public function organizations() {
        return $this->belongsToMany('App\Models\Organization');
    }
}
