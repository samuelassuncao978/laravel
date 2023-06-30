<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\UsesSystemConnection;

class CreateInvoiceRecordsTable extends Migration
{
    use UsesSystemConnection;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("invoice_records", function (Blueprint $table) {
            $table->uuid("invoice_id");
            $table->uuid("record_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("invoice_records");
    }
}
