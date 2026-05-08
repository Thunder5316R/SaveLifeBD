<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'requested_by',
        'patient_name',
        'blood_group',
        'district',
        'hospital_name',
        'contact_number',
        'units_needed',
        'note',
        'status',
        'donors_notified',
        'notified_donor_ids',
    ];

    protected $casts = [
        'notified_donor_ids' => 'array',
    ];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }
}