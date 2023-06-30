<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("vouchers", function (Blueprint $table) {
            $table->uuid("id");
            $table->string("code", 8)->nullable();
            $table->string("name");
            $table->enum("type", ["fixed", "percentage"])->default("fixed");
            $table->enum("eligibility", ["unrestricted", "once-per-client", "first-time-client"])->default("unrestricted");
            $table->bigInteger("amount")->default(0);
            $table->string("currency")->nullable();
            $table->bigInteger("limit")->default(0);
            $table->timestamp("start_at")->nullable();
            $table->timestamp("end_at")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("voucher");
    }
}
