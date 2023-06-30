<?php

namespace App\Traits\Livewire;

trait Modal
{
    public $origin = null;

    public function close()
    {
        $this->emitTo($this->origin, "cancel", static::class);
    }
}
