<?php

namespace App\Traits\Livewire;

trait Wizard
{
    public $steps;

    public function current_step()
    {
        return collect($this->steps)
            ->where("current", true)
            ->toArray();
    }

    public function mark_current_step_as_complete()
    {
        $current = collect($this->current_step())
            ->keys()
            ->first();

        $this->steps = collect($this->steps)
            ->map(function ($step, $name) use ($current) {
                return $name === $current
                    ? array_merge($step, [
                        "complete" => true,
                        "current" => false,
                    ])
                    : $step;
            })
            ->toArray();
    }

    public function step_to($next = null)
    {
        $this->steps = collect($this->steps)->map(function ($step, $name) use ($next) {
            return $name === $next ? array_merge($step, ["current" => true]) : array_merge($step, ["current" => false]);
        });
    }

    public function next()
    {
        $next = collect($this->steps)
            ->skipWhile(function ($step, $name) {
                if (optional($step)["complete"] === true) {
                    return true;
                } else {
                    return optional($step)["current"];
                }
                return optional($step)["current"] && optional($step)["complete"] === false ? true : false;
            })
            ->keys()
            ->first();
        $this->mark_current_step_as_complete();
        $this->steps = collect($this->steps)->map(function ($step, $name) use ($next) {
            return $name === $next ? array_merge($step, ["current" => true]) : array_merge($step, ["current" => false]);
        });
    }

    public function previous()
    {
        // $this->steps = collect($this->steps);
        // $next = $this->steps->skipUntil(function ($step, $active) { return boolval($active); })->keys()->first();
        // $this->steps = $this->steps->map(function ($active, $step) use($next) { return ($step===$next ? true : false); });
    }
}
