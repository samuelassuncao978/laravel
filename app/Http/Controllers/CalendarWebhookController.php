<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Facades\CalendarManager;

class CalendarWebhookController extends Controller
{
    /**
     * Handle a notification about changes
     */
    public function __invoke(Calendar $calendar, Request $request)
    {
        return CalendarManager::handleChangeNotification($calendar, $request);
    }
}
