<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Eloquent with User
     */
    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

}
