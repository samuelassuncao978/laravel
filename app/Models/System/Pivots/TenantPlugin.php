<?php

namespace App\Models\System\Pivots;

use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesSystemConnection;

class TenantPlugin extends Model
{
    use UsesSystemConnection;

    protected $table = "tenants_plugins";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
