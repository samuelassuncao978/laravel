<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

// Facades
use App\Facades\Availability;

// Models
use App\Models\Message;
use App\Models\Conversation;
use App\Models\Folder;
use App\Models\Tag;
use App\Models\File;
use App\Models\Client;
use App\Models\Note;
use App\Models\Appointment;
use App\Models\AppointmentType;
use App\Models\AppointmentMethod;
use App\Models\Voucher;
use App\Models\Role;
use App\Models\Homework;
use App\Models\Calendar;
use App\Models\Leave;

// Pivots
use App\Models\Pivots\ConversationUser;
use App\Models\Pivots\UserFolder;
use App\Models\Pivots\UserTag;
use App\Models\Pivots\UserFile;
use App\Models\Pivots\UserClient;
use App\Models\Pivots\UserNote;
use App\Models\Pivots\UserAppointment;
use App\Models\Pivots\UserAppointmentType;
use App\Models\Pivots\UserAppointmentMethod;
use App\Models\Pivots\UserVoucher;
use App\Models\Pivots\UserRole;
use App\Models\Pivots\UserHomework;
use App\Models\Pivots\UserCalendar;
use App\Models\Pivots\UserLeave;

// Traits
use App\Traits\Extendable;
use App\Traits\UsesUuid;
use App\Traits\ScopeInvisible;

// Casts
use App\Casts\FileCast;
use App\Casts\PhoneCast;
use App\Casts\AddressCast;

// Jobs
use App\Jobs\Appointment\GenerateAppointmentAvailableSlots;

use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\BroadcastableModelEventOccurred;


class User extends Authenticatable implements MustVerifyEmail
{
    use UsesUuid, HasFactory, Notifiable, Extendable, ScopeInvisible,  BroadcastsEvents;

    protected $table = "users";
    public $incrementing = false;
    protected $keyType = "string";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "first_name", "last_name", "email", "photo", "password", "date_of_birth", "phone", "address", "notification_sounds",
        "notification_summaries", "messenger_sounds", "messenger_summaries", "messenger_client_can_initiate", "invisible",
        'appointments_changed_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ["password", "remember_token"];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "photo" => FileCast::class,
        // "phone" => PhoneCast::class,
        // "address" => AddressCast::class,
        // "date_of_birth" => "date",
        // "email_verified_at" => "datetime",
        // "notification_sounds" => "boolean",
        // "notification_summaries" => "boolean",
        // "messenger_sounds" => "boolean",
        // "messenger_summaries" => "boolean",
        // "messenger_client_can_initiate" => "boolean",
        // 'appointments_changed_at' => 'datetime',
    ];

    protected static function booted()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!optional($model)->id) {
                $model->id = (string) Str::uuid();
            }
            if (!optional($model)->password) {
                $model->password = (string) Str::uuid();
            }
        });
    }

    public function messages()
    {
        return $this->belongsToMany(Message::class, MessageUser::class);
    }

    public function leave()
    {
        return $this->belongsToMany(Leave::class, UserLeave::class);
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, ConversationUser::class);
    }

    public function folders()
    {
        return $this->belongsToMany(Folder::class, UserFolder::class);
    }

    public function calendars()
    {
        return $this->belongsToMany(Calendar::class, UserCalendar::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class, UserFile::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, UserTag::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, UserRole::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, UserClient::class);
    }

    public function notes()
    {
        return $this->belongsToMany(Note::class, UserNote::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, UserAppointment::class);
    }

    public function appointment_types()
    {
        return $this->belongsToMany(AppointmentType::class, UserAppointmentType::class)->withPivot("charge");
    }

    public function appointment_methods()
    {
        return $this->belongsToMany(AppointmentMethod::class, UserAppointmentMethod::class)->withPivot("charge");
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, UserVoucher::class);
    }

    public function homework()
    {
        return $this->belongsToMany(Homework::class, UserHomework::class);
    }

    // Attributes
    public function getNameAttribute()
    {
        if (!empty($this->first_name) && !empty($this->last_name)) {
            return $this->first_name . " " . $this->last_name;
        }
        return null;
    }

    public function getRoleAttribute()
    {
        return optional($this->roles()->first())->name;
    }

    public function getRatesRangeAttribute()
    {
        $rates = $this->appointment_types
            ->pluck("pivot")
            ->pluck("amount")
            ->toArray();
        if (count($rates) > 0) {
            if (min($rates) === 0 && max($rates) === 0) {
                return null;
            } elseif (min($rates) === max($rates)) {
                return min($rates);
            }
            return [min($rates), max($rates)];
        }
        return null;
    }

    public function upload_limit()
    {
        $user_limit = 1024;

        $max_upload = (int) ini_get("upload_max_filesize");
        $max_post = (int) ini_get("post_max_size");
        $upload_mb = min($max_upload, $max_post, $user_limit);

        return $upload_mb * (1024 * 1024);
    }

    public function storage()
    {
        $allocated = 455 * (1024 * 1024);
        $used = $this->files()->sum("size");
        $available = $allocated - $used;
        return collect([
            "allocated" => $allocated,
            "available" => $available,
            "used" => $used,
        ]);
    }

    public function availability()
    {
        return new Availability($this);
    }

    /**
     * The user working hours
     * 
     * @return array
     */
    public function getWorkingHours()
    {
        return [
            'mon' => ['start' => '9:00', 'end' => '17:00'],
            'tue' => ['start' => '9:00', 'end' => '17:00'],
            'wed' => ['start' => '10:00', 'end' => '18:00'],
            'thu' => ['start' => '10:00', 'end' => '18:00'],
            'fri' => ['start' => '10:00', 'end' => '18:00'],
            'sat' => false,
            'sun' => false,
        ];
    }

    /**
     * The user appointment available slots
     * 
     * @return HasMany
     */
    public function appointmentAvailableSlots()
    {
        return $this->hasMany(AppointmentAvailableSlot::class);
    }

    /**
     * Get the moment when any of the user appointment has been changed
     * 
     * @return Carbon
     */
    public function appointmentsChangedAt()
    {
        return $this->appointments_changed_at;
    }

    /**
     * Mark that any of the user appointment has been changed
     * 
     * @return void
     */
    public function appointmentsChanged()
    {
        $this->update([
            'appointments_changed_at' => now(),
        ]);
    }

    /**
     * Regenerate the user appointment available slots
     * 
     * @return void
     */
    public function regenerateAppointmentAvailableSlots()
    {
        GenerateAppointmentAvailableSlots::dispatch($this);
    }

    public function broadcastOn($event)
    {
        switch ($event){
            case 'created':
                return ['App.Models.User','App.Models.User.'.$this->id];
            default:
                return ['App.Models.User.'.$this->id];
        }

    }
    public function broadcastAs($event)
    {

        switch ($event){
            case 'created':
                return 'created';
            case 'updated':
                return 'updated';
            case 'deleted':
                return 'credeletedated';
            default:
                return null;
        }

      
    }

}
