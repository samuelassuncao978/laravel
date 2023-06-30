<?php

namespace App\Http\Controllers\Appointments;

use Sihq\Facades\Controller;
use Illuminate\Support\Facades\Http;
use Sihq\Traits\Authenticated;

class Appointments extends Controller
{
    public function onMount(){
        // $this->user = auth()->user();
        $response = Http::get('https://foremind.sihq.com.au/api/3.0/appointments/get-appointments-by-email/articnordic.dev@gmail.com');
        $this->appointments = $response->json();
    }
}