<?php

namespace App;

use App\CancelledAppointment;
use App\Specialty;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
    	'description',
    	'specialty_id',
    	'doctor_id',
    	'patient_id',
    	'scheduled_date',
    	'scheduled_time',
    	'type',
    ];

    // N $appointment->specialty 1
    public function specialty()
    {
    	return $this->belongsTo(Specialty::class);
    }

    // N $appointment->doctor 1
    public function doctor()
    {
    	return $this->belongsTo(User::class);
    }

    // N $appointment->patient 1
    public function patient()
    {
    	return $this->belongsTo(User::class);
    }

    // Appointment hasOne 1 - 1/0 belongsTo CancelledAppointment
    // $appointment->cancelation->justification

    public function cancellation()
    {
        return $this->hasOne(CancelledAppointment::class);
    }

    // accessor
    // $appointmet->scheduled_time_12
    public function getScheduledTime12Attribute()
    {
    	return (new Carbon($this->scheduled_time))->format('g:i A');
    }
}
