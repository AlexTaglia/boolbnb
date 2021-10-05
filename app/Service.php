<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
    ];

    public function apartment() {
        return $this->belongsToMany(Apartment::class);
    }
}
