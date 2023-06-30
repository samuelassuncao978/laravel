<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\UsesSystemConnection;

class CreateInvoiceTable extends Migration
{
    use UsesSystemConnection;
    public function up()
    {
        Schema::create("invoices", function (Blueprint $table) {
            $table->uuid("id");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists("invoices");
    }
}
