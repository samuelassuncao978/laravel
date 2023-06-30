<?php

namespace App\Http\Livewire\Admin\Settings;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Setting;

class Policies extends Component
{
    public Setting $terms_of_use;
    public Setting $privacy_policy;

    public $rules = [
        "terms_of_use.value" => "required",
        "privacy_policy.value" => "required",
    ];

    public function mount()
    {
        $this->terms_of_use = Setting::firstOrCreate(["setting" => "terms_of_service"]);
        $this->privacy_policy = Setting::firstOrCreate(["setting" => "privacy_policy"]);
    }

    public function render()
    {
        return view("pages.admin.settings.policies");
    }

    public function save()
    {
        $this->terms_of_use->save();
        $this->privacy_policy->save();
    }
}
