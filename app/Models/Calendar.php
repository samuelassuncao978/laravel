<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Models
use App\Models\User;

// Pivots
use App\Models\Pivots\UserCalendar;

// Traits
use App\Traits\UsesUuid;

// Facades
use App\Facades\CalendarManager;

// Jobs
use App\Jobs\Calendar\WatchCalendar;
use App\Jobs\Calendar\StopWatchingCalendar;
use App\Jobs\Calendar\RefreshAccessToken;

class Calendar extends Model
{
    use UsesUuid, SoftDeletes;

    protected $table = "calendars";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["type", "credentials", "account", "watching_properties", "watching_expires_at", "synced_at", "external_id", "sync_token"];

    protected $casts = [
        "failed_at" => "date",
        "created_at" => "date",
        "updated_at" => "date",
        "deleted_at" => "date",
        "credentials" => "json",
        "sync_tokens" => "json",
        "watching_properties" => "array",
    ];

    protected $dates = ["watching_expires_at", "synced_at"];

    public function users()
    {
        return $this->belongsToMany(User::class, UserCalendar::class);
    }

    /**
     * Related events
     */
    public function events()
    {
        return $this->hasMany(CalendarEvent::class);
    }

    /**
     * Refresh watching webhook expiration
     */
    public function refreshWatching()
    {
        $this->stopWatching() // TODO: delay?
            ->watch();
    }

    /**
     * Stop watching a remote copy of this calendar
     */
    public function stopWatching()
    {
        StopWatchingCalendar::dispatch($this);

        return $this;
    }

    /**
     * Watch for any changes on a remote calendar
     */
    public function watch()
    {
        WatchCalendar::dispatch($this);

        return $this;
    }

    /**
     * Make a full sync with a remote calendar
     */
    public function sync()
    {
        CalendarManager::syncEvents($this);

        return $this;
    }

    /**
     * Mark as synced
     */
    public function synced(array $syncProperties = [])
    {
        $this->update(
            array_merge(
                [
                    "synced_at" => now(),
                ],
                $syncProperties
            )
        );
    }

    /**
     * Create a calendar
     */
    public function createFromProvider(string $type, array $authProperties)
    {
        # Normalize auth token props
        $normalizedAuthProperties = CalendarManager::normalizeAuthProperties($type, $authProperties);

        # Create a model
        $calendar = self::create([
            "type" => $type,
            "credentials" => $normalizedAuthProperties,
        ]);

        # Link just created model with authenticated user
        $calendar->users()->sync(
            auth()
                ->guard("admin")
                ->id()
        );

        return $calendar;
    }

    /**
     * Set credentials
     */
    public function setCredentials(array $credentials)
    {
        $this->update([
            "credentials" => $credentials,
        ]);
    }

    /**
     * Set an external id for the calendar
     */
    public function setExternalId()
    {
        # Let's get the remote calendar's properties
        $remoteCalendarProperties = CalendarManager::getCalendar($this);

        $this->update([
            "external_id" => $remoteCalendarProperties["external_id"],
        ]);

        return $this;
    }

    /**
     * Access token getter
     */
    public function getAccessToken()
    {
        if (!isset($this->credentials["access_token"])) {
            return null;
        }

        return $this->credentials["access_token"]["token"] ?? null;
    }

    /**
     * Refresh token getter
     */
    public function getRefreshToken()
    {
        if (!isset($this->credentials["refresh_token"])) {
            return null;
        }

        return $this->credentials["refresh_token"]["token"] ?? null;
    }

    /**
     * Do the access token refresh
     */
    public function refreshAccessToken()
    {
        RefreshAccessToken::dispatch($this);

        return $this;
    }

    /**
     * Sync token getter
     */
    public function getSyncToken()
    {
        return $this->sync_token;
    }

    /**
     * Reset the sync token
     */
    public function resetSyncToken()
    {
        $this->update([
            "sync_token" => null,
        ]);
    }

    /**
     * Get a collection of renderable events
     */
    public function renderableEvents(array $range)
    {
        return CalendarManager::getRenderableEvents($this, $range);
    }
}
