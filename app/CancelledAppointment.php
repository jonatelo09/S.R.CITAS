<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CancelledAppointment extends Model
{
    public function cancelled_by()
    {
    	// belongsTo Cancellation N - 1 User
    	return $this->belongsTo(User::class);
    }
}
