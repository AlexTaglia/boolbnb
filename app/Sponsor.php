<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'name',
        'duration'
    ];

    public function apartment() {
        return $this->belongsToMany(Apartment::class);
    }
}
