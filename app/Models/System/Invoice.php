<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

// Traits
use App\Traits\UsesSystemConnection;
use App\Traits\UsesUuid;

// Models
use App\Models\System\Tenant;
use App\Models\System\Record;

// Pivots
use App\Models\System\Pivots\TenantInvoice;
use App\Models\System\Pivots\InvoiceRecord;

class Invoice extends Model
{
    use UsesSystemConnection, UsesUuid;

    protected $table = "invoices";
    public $incrementing = false;
    protected $keyType = "string";

    protected $casts = [
        "start_at" => "datetime",
        "end_at" => "datetime",
    ];

    protected $fillable = ["start_at", "end_at", "tenant"];

    /*- Relationships */
    public function tenants()
    {
        return $this->belongsToMany(Tenant::class, TenantInvoice::class);
    }

    public function records()
    {
        return $this->belongsToMany(Record::class, InvoiceRecord::class);
    }

    public function subtotal()
    {
        return $this->records()->sum("subtotal");
    }
}
