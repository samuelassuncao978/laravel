<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Component;

// Models
use App\Models\Appointment;
use App\Models\Client;
use App\Models\User;

// Traits
use App\Traits\Livewire\Modal;
use App\Traits\Livewire\Wizard;
use App\Traits\Livewire\Stepable;

class Create extends Component
{
    use Modal, Wizard, Stepable;

    public Appointment $appointment;
    public ?Client $client = null;
    public ?User $user = null;

    public $rules = [
        "appointment.start_at" => "datetime",
        "appointment.end_at" => "datetime",
        "appointment.type_id" => "uuid",
        "appointment.method_id" => "uuid",
    ];

    public $method;
    public $type;

    public function mount()
    {
        $this->appointment = new Appointment();
        $this->appointment->type_id = optional(
            optional(
                auth()
                    ->guard("admin")
                    ->user()->appointment_types
            )->first()
        )->id;

        $this->_steps = [
            "client" => "complete",
            "type" => "active",
            "times" => null,
            "confirm" => null,
        ];
    }

    public function render()
    {
        $types = auth()
            ->guard("admin")
            ->user()->appointment_types;

        $methods = auth()
            ->guard("admin")
            ->user()
            ->appointment_methods()
            ->whereHas("appointment_types", function ($q) {
                $q->where("id", $this->appointment->type_id);
            })
            ->get();

        // $types = \App\Models\AppointmentType::owned()->whereHas('appointment_methods',function($q){
        //     $q->whereHas('users',function($q){
        //         $q->where('id',auth()->user()->id);
        //     });
        // })->get(); //->map(function($c){return ['id'=>$c->id,'text'=>$c->name];})->toArray();

        //   $methods = collect(optional(\App\Models\AppointmentType::find(optional(optional($this)->form)['type_id'] ?? optional(optional($types)[0])['id']))->appointment_methods ?? [])->map(function($c){return ['id'=>$c->id,'text'=>$c->name];})->toArray();

        return view("segments.admin.appointments.create", [
            "types" => $types,
            "methods" => $methods,
        ]);
    }

    public function save()
    {
        $this->appointment->save();
        if ($this->client) {
            $this->appointment->clients()->sync($this->client->id);
        }
        $this->appointment->users()->sync(auth()->user()->id);
        $this->close();
    }
}
