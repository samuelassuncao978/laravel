<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\UsesSystemConnection;

class CreateTenantInvoicesTable extends Migration
{
    use UsesSystemConnection;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tenant_invoices", function (Blueprint $table) {
            $table->uuid("tenant_id");
            $table->uuid("invoice_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("tenant_invoices");
    }
}
