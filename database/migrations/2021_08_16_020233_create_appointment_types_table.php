<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("appointment_types", function (Blueprint $table) {
            $table->uuid("id");
            $table->string("name");
            $table->string("icon")->nullable();
            $table->decimal("duration", 4, 2)->default(0);
            $table->bigInteger("charge")->default(0);
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
        Schema::dropIfExists("appointment_types");
    }
}
