<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

// Traits
use App\Traits\UsesSystemConnection;
use App\Traits\UsesUuid;

// Models
use App\Models\System\Invoice;

// Pivots
use App\Models\System\Pivots\InvoiceRecord;

class Record extends Model
{
    use UsesSystemConnection, UsesUuid;

    protected $table = "records";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["description", "qty", "cost", "subtotal", "plan"];

    /*- Relationships */
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, InvoiceRecord::class);
    }
}
