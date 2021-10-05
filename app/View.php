<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = [
        'ip',
        'last_access',
        'apartment_id'
    ];

    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }
}
