<?php

namespace App\Http\Livewire\Tenants\Authentication;

// Illuminate
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;
use App\Models\System\Connection;
use App\Models\User;
use App\Models\Setting;


// Traits
use App\Traits\Livewire\Stepable;

// Notifications
use App\Notifications\Tenants\WelcomeNotification;

class Register extends Component
{
    use Stepable;

    public Tenant $tenant;
    public $customer;

    public $managed = true;

    public $settings = [];

    public $rules = [
        "customer.company_name" => "required",
        "customer.first_name" => "required",
        "customer.last_name" => "required",
        "customer.email" => "required",
        "customer.phone" => "required|phone",
        "tenant.domain" => "string",
        "tenant.plan" => "string",
        "tenant.domain" => "string",
    ];

    public function mount()
    {
        $this->tenant = new Tenant();
        $this->customer = ["phone" => ["country" => "AU", "number" => ""]];

        $this->_steps = [
            "customer" => "active",
            "setup" => null,
            "plan" => null,
            "confirm" => null,
            "complete" => null,
        ];
    }

    public function render()
    {
        $plans = array_diff(scandir(app_path("Plans")), ["..", "."]);

        $plans = collect($plans)->map(function ($p) {
            $classname = "App\\Plans\\" . str_replace(".php", "", $p);
            $class = new $classname();

            return [
                "id" => str_replace(".php", "", $p),
                "public" => optional($class)->public,
                "name" => optional($class)->name,
                "description" => optional($class)->description,
                "promoted" => optional($class)->promoted,
                "amount" => optional($class)->amount,
                "frequency" => optional($class)->frequency,
            ];
        });
        return view("pages.tenants.authentication.register", [
            "plans" => $plans,
        ])->layout("components.container");
    }

    public function next()
    {
        if ($this->steps()->current === "customer") {
            $this->tenant->domain = Str::kebab(Str::words($this->customer["company_name"] ?? "", 3, ""));

            $this->validate([
                "customer.company_name" => "required",
                "customer.first_name" => "required",
                "customer.last_name" => "required",
                "customer.email" => "required",
                "customer.phone" => "required|phone",
            ]);
        } elseif ($this->steps()->current === "setup") {
            $this->validate([
                "tenant.domain" => "required|unique:central.tenants,domain",
            ]);
        }
        $this->steps()->next();
    }

    public function select_plan($plan)
    {
        $this->tenant->plan = $plan;
        $this->next();
    }

    public function save()
    {
        // $this->authorize("create", $this->tenant);

        $this->validate();

        $name = (string) Str::limit(Str::of($this->tenant->id)->replace("-", ""), 12, "");
        $this->tenant->customer = $this->customer;
        $this->tenant->database = Connection::create(["database" => $name]);
        $this->tenant->domain = $this->tenant->domain . "." . parse_url(config("app.url"), PHP_URL_HOST);
        $this->tenant->save();
        $this->tenant->migrate();
        $this->tenant->seed();

        $this->tenant->run(function () {
            Setting::create([
                'group'=>'system',
                'setting'=>'app.name',
                'value'=> $this->customer['company_name'] 
            ]);
            Setting::create([
                'group'=>'system',
                'setting'=>'mail.from.name',
                'value'=> $this->customer['company_name'] 
            ]);

            $user = User::create([
                "first_name" => $this->tenant->customer["first_name"],
                "last_name" => $this->tenant->customer["last_name"],
                "email" => $this->tenant->customer["email"],
                "password" => Hash::make("1234"),
            ]);
            $user->notify(new WelcomeNotification("1234", $this->tenant->domain . "/admin"));
        });

        $this->next();
    }
}
