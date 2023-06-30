<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("transactions", function (Blueprint $table) {
            $table->uuid("id");
            $table->enum("type", ["charge", "refund"]);
            $table->bigInteger("amount")->default(0);
            $table->string("currency")->nullable();
            $table->string("card")->nullable();
            $table->string("expiry")->nullable();
            $table->string("issuer")->nullable();
            $table->string("country")->nullable();
            $table->string("fee")->nullable();
            $table->string("account")->nullable();
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
        Schema::dropIfExists("transactions");
    }
}
