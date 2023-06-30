<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("appointments", function (Blueprint $table) {
            $table->uuid("id");
            $table->uuid("type_id")->nullable();
            $table->uuid("method_id")->nullable();
            $table->timestamp("start_at")->nullable();
            $table->timestamp("end_at")->nullable();
            $table->string("payee")->nullable();
            $table->timestamp("arrived_at")->nullable();
            $table->timestamp("seen_at")->nullable();
            $table->timestamp("discharged_at")->nullable();
            $table->timestamp("cancelled_at")->nullable();
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
        Schema::dropIfExists("appointments");
    }
}
