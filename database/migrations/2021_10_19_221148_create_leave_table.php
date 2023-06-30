<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("leave", function (Blueprint $table) {
            $table->uuid("id");
            $table->text("description")->nullable();
            $table->string("type")->nullable();
            $table->timestamp("start_at")->nullable();
            $table->timestamp("end_at")->nullable();
            $table->boolean("approved")->default(true);
            $table->uuid("approved_by")->nullable();
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
        Schema::dropIfExists("leave");
    }
}
