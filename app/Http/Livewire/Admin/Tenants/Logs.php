<?php

namespace App\Http\Livewire\Admin\Tenants;

use App\Http\Livewire\Component;
use Laravel\VaporUi\Repositories\LogsRepository;

// Models
use App\Models\System\Tenant;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Logs extends Component
{
    use Paginatable, Groupable, Searchable;

    public Tenant $tenant;

    public function render(LogsRepository $repository)
    {
        // $repository = new LogsRepository();

        $filter = [
            "startTime" => now()->subDays(1)->timestamp,
            // "type" => "",
            "group" => "",
            "query" => $this->search,
        ];
        $logs = $repository->search("queue", $filter);

        return view("pages.admin.tenants.logs", [
            "logs" => $logs->entries,
        ]);
    }
}
