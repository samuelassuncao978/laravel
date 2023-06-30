<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Company;

class Sidebar extends Component
{
    use WithPagination;

    public $search = "";
    public $withTrashed = false;
    public $withOwned = false;
    public $model = null;
    public $column = null;
    public $view = null;
    public $rows;

    public function mount($model = null, $column = null, $view = null)
    {
        $this->model = $model;
        $this->column = $column;
        $this->view = $view;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $results = $this->model::where($this->column, "LIKE", "%$this->search%");
        if ($this->withTrashed) {
            $results->withTrashed();
        }
        return view($this->view, [
            "results" => $results->paginate($this->rows),
            "search" => $this->search,
            "withTrashed" => $this->withTrashed,
        ]);
    }

    public function withTrashed()
    {
        $this->withTrashed = !$this->withTrashed;
    }

    public function withOwned()
    {
        $this->withOwned = !$this->withOwned;
    }
}
