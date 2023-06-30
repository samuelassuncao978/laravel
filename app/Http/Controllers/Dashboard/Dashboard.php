<?php

namespace App\Http\Controllers\Dashboard;

use Sihq\Facades\Controller;
use Illuminate\Support\Facades\Http;
use Sihq\Traits\Authenticated;
// Models
use App\Models\Role;

class Dashboard extends Controller
{
    use Authenticated;
    public Role $role;
    
    public function onMount(){
        $this->user = auth()->user();
        $this->role = optional(auth()->user()->roles)->first();
        $response = Http::get('https://foremind.sihq.com.au/api/3.0/appointments/get-appointments-by-email/'.$this->user->email);
        $this->appointments = $response->json();
    }
}