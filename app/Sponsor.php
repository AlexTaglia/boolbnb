<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'name',
        'duration',
        'price',
        'method', 
        'value', 
        'status',
        'started_on', 
        'end_on'
    ];

    public function apartment() {
        return $this->belongsToMany(Apartment::class)
        ->withPivot(['method', 'value', 'status','started_on', 'end_on']);
    }
}
