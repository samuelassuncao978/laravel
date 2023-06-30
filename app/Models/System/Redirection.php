<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

// Traits
use App\Traits\UsesSystemConnection;

class Redirection extends Model
{
    use UsesSystemConnection;
    protected $table = "redirections";
}
