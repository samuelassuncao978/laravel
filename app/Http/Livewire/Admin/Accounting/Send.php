<?php

namespace App\Http\Livewire\Admin\Accounting;

use App\Http\Livewire\Component;

// Models
use App\Models\Appointment;
use App\Models\Client;
use App\Models\User;
use App\Models\Transaction;

// Traits
use App\Traits\Livewire\Modal;

class Send extends Component
{
    use Modal;

    public Appointment $appointment;
    public Client $client;
    public User $user;

    public $rules = [];

    public function mount()
    {
        $this->client = $this->appointment->clients()->first();
        $this->user = $this->appointment->users()->first();
    }

    public function render()
    {
        return view("segments.admin.accounting.payment-link");
    }

    public function save()
    {
        // Charge card
        $this->close();
    }
}
