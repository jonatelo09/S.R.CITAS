<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
	// $specialty->users
    public function users()
    {
    	return $this->belongsToMany(User::class)->withTimestamps();
    }
}
