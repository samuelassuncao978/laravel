<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("calendars", function (Blueprint $table) {
            $table->uuid("id");
            $table->string("type");
            $table->string("account")->nullable();
            $table->json("credentials")->nullable();
            $table->json("sync_tokens")->nullable();
            $table->timestamp("last_sync")->nullable();
            $table->timestamp("failed_at")->nullable();
            $table->text("failed_reason")->nullable();
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
        Schema::dropIfExists("calendars");
    }
}
