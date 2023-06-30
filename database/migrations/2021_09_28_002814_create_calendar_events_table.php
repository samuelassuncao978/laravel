<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("calendar_events", function (Blueprint $table) {
            $table->uuid("id");
            $table->string("name")->nullable();
            $table->timestamp("start_at")->nullable();
            $table->timestamp("end_at")->nullable();
            $table->uuid("calendar_id")->nullable();
            $table->string("reference")->nullable();
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
        Schema::dropIfExists("calendar_events");
    }
}
