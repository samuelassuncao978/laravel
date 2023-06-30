<?php

namespace App\Http\Livewire\Data;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Modal;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use Modal;

    public function render()
    {
        return view("segments.data.import");
    }

    public function save()
    {
        Excel::import(new UsersImport(), storage_path("users.csv"));

        $this->close();
    }
}
