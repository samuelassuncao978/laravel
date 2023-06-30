<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Component;

// Models
use App\Models\Appointment as AppointmentModel;
use App\Models\Client;
use App\Models\File;
use App\Models\Employer;
use App\Models\Voucher;

class Appointment extends Component
{
    public AppointmentModel $appointment;
    public Client $client;

    public $rules = [
        "client.first_name" => "string",
        "client.last_name" => "string",
        "client.email" => "string",
        "client.preferred_name" => "string",
        "client.date_of_birth" => "date",
        "client.sex" => "string",
        "client.pronouns" => "string",
        "client.sexual_orientation" => "string",
        "client.phone" => "phone",
        "client.address" => "address",

        "client.occupation" => "string",
        "client.doctor" => "string",
        "client.next_of_kin" => "string",
        "client.allergies" => "string",
        "client.medication" => "string",
        "client.medicare" => "string",

        "appointment.type_id" => "uuid",
        "appointment.method_id" => "uuid",
        "appointment.start_at" => "date",
        "appointment.end_at" => "date",

        "appointment.payee" => "string",

        "employer_id" => "",
        "voucher_id" => "",
    ];

    public $employer_id = null;
    public $voucher_id = null;

    public $appointmentid;

    public function mount()
    {
        $this->client = $this->appointment->clients()->first();
        $this->employer_id = optional($this->client->employers()->first())->id;
        $this->is_owned = auth()
            ->guard("admin")
            ->user()
            ->clients()
            ->where("id", $this->client->id)
            ->first()
            ? false
            : true;
    }

    public function switch($appointment)
    {
        $this->appointment = AppointmentModel::find($appointment);
        $this->client = $this->appointment->clients()->first();
    }

    public function render()
    {
        $dirty = $this->appointment->getDirty();

        $this->appointment = $this->appointment->fresh();
        $this->appointment->fill($dirty);

        $types = $this->appointment->users()->first()->appointment_types;

        $methods = $this->appointment
            ->users()
            ->first()
            ->appointment_methods()
            ->whereHas("appointment_types", function ($q) {
                $q->where("id", $this->appointment->type_id);
            })
            ->get();

        $files = $this->appointment
            ->files()
            ->owned()
            ->get();

        return view("pages.appointments.appointment.appointment", [
            "first_appointment" => $this->client
                ->appointments()
                ->owned()
                ->first(),
            "next_appointment" => $this->client
                ->appointments()
                ->owned()
                ->whereNotIn("id", [$this->appointment->id])
                ->next()
                ->first(),
            "total_appointments" => $this->client
                ->appointments()
                ->owned()
                ->count(),
            "files" => $files,
            "types" => $types,
            "methods" => $methods,
        ]);
    }

    public function attachVoucher()
    {
        if ($voucher = Voucher::where("code", str_replace("-", "", $this->voucher_id))->first()) {
            $this->appointment->vouchers()->sync($voucher->id);
        } else {
            dd("failed");
        }
    }

    public function removeVoucher()
    {
        $this->appointment->vouchers()->sync([]);
    }

    public function save()
    {
        $this->validate();
        if ($this->employer_id) {
            if (!($employer = Employer::find($this->employer_id))) {
                $employer = Employer::create(["name" => $this->employer_id]);
            }
            $this->client->employers()->sync($employer->id);
        }

        $this->client->save();
        $this->appointment->save();
    }
}
