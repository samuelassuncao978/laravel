<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $withTrashed = false;
    public $model = null;
    public $view = null;

    public $rows = 20;

    public function mount($model = null, $view = null, $data = null)
    {
        $this->data = $data;
        $this->model = $model;
        $this->view = $view;
    }

    public function render()
    {
        $results = $this->data;
        if ($this->withTrashed) {
            $results->withTrashed();
        }
        return view($this->view, [
            "results" => $results->paginate($this->rows),
        ]);
    }

    public function withTrashed()
    {
        $this->withTrashed = !$this->withTrashed;
    }
}
