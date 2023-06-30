<?php

namespace App\Models\System\Pivots;

use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesSystemConnection;

class InvoiceRecord extends Model
{
    use UsesSystemConnection;

    protected $table = "invoice_records";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
