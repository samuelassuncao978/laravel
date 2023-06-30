<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("notes", function (Blueprint $table) {
            $table->uuid("id");
            $table->uuid("template_id")->nullable();
            $table->text("note")->nullable();
            $table->enum("protection", ["unsealed", "sealed"])->default("unsealed");
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
        Schema::dropIfExists("notes");
    }
}
