<?php

namespace App\Traits\Livewire;

use Livewire\WithPagination;

trait Paginatable
{
    use WithPagination;

    public $rows = 20;
}
