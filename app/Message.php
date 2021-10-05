<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'text',
        'sender_name',
        'email',
        'apartment_id'
    ];

    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }
}
