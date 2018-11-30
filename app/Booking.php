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
     * Register the field to date
     */
    protected $dates = ['start_date', 'end_date'];

    /**
     * Eloquent one to one with room
     */
    public function room()
    {
    	return $this->belongsTo(Room::class);
    }

     /**
     * Many to one relations with User
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
