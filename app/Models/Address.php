<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['street', 'parish', 'country'];

    protected $hidden = ['pivot'];

    public function addressable() {
        return $this->morphTo();
    }
}
