<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAppointmentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("users_appointment_types", function (Blueprint $table) {
            $table->uuid("user_id");
            $table->uuid("appointment_type_id");
            $table->bigInteger("charge")->nullable();
            $table->decimal("duration", 4, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("users_appointment_types");
    }
}
