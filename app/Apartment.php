<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title',
        'n_beedroom',
        'n_beds',
        'n_bathrooms',
        'square_meters',
        'long',
        'lat',
        'address',
        'img',
        'visible',
        'price_per_night',
        'user_id'
    ];

    public function sponsor() {
        return $this->belongsToMany(Sponsor::class);
    }

    public function service() {
        return $this->belongsToMany(Service::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function view() {
        return $this->hasMany(View::class);
    }

    public function message() {
        return $this->hasMany(Message::class);
    }
    
}
