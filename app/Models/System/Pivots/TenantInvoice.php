<?php

namespace App\Models\System\Pivots;

use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesSystemConnection;

class TenantInvoice extends Model
{
    use UsesSystemConnection;

    protected $table = "tenant_invoices";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
