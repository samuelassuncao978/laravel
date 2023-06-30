<?php

namespace App\Http\Livewire\Admin\Tenants;

// Illuminate
use Illuminate\Support\Str;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;
use App\Models\System\Connection;

// Traits
use App\Traits\Livewire\Modal;
use App\Traits\Livewire\Stepable;

class Create extends Component
{
    use Modal, Stepable;

    public Tenant $tenant;

    public $managed = true;

    public $settings = [];

    public $rules = [
        "tenant.customer.company_name" => "required",
        "tenant.customer.first_name" => "required",
        "tenant.customer.last_name" => "required",
        "tenant.customer.email" => "required",
        "tenant.customer.phone.number" => "required",
        "tenant.domain" => "string",
        "tenant.plan" => "string",
        "tenant.domain" => "string",
    ];

    public function mount()
    {
        $this->tenant = new Tenant();

        $this->_steps = [
            "customer" => "active",
            "setup" => null,
            "plan" => null,
            "finish" => null,
        ];
    }

    public function render()
    {
        $plans = array_diff(scandir(app_path("Plans")), ["..", "."]);

        $plans = collect($plans)->map(function ($p) {
            return [
                "id" => str_replace(".php", "", $p),
                "text" => str_replace(".php", "", $p),
            ];
        });
        return view("segments.admin.tenants.create", [
            "plans" => $plans->toArray(),
        ]);
    }

    public function next()
    {
        if ($this->steps()->current === "customer") {
            $this->tenant->domain = Str::kebab(Str::words($this->tenant->customer["company_name"] ?? "", 3, ""));
        }
        $this->steps()->next();
    }

    public function save()
    {
        $this->authorize("create", $this->tenant);

        $name = (string) Str::limit(Str::of($this->tenant->id)->replace("-", ""), 12, "");
        $this->tenant->database = Connection::create(["database" => $name]);
        $this->tenant->domain = $this->tenant->domain . "." . parse_url(config("app.url"), PHP_URL_HOST);
        $this->tenant->save();
        $this->tenant->migrate();
        $this->tenant->seed();
        //

        $this->close();
    }
}
