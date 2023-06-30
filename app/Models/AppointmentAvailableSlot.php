<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class AppointmentAvailableSlot extends Model
{
    use HasFactory, UsesUuid;

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    /**
     * A related user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
