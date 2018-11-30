<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * Empty guarded fields
     */
    protected $guarded = [];

    /**
     * Eloquent one to one with room
     */
    public function room()
    {
    	return $this->hasOne(Room::class);
    }

    /**
     * Eloquent with User
     */
    public function customer()
    {
    	return $this->belongsToMany(User::class);
    }
}
