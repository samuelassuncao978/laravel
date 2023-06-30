<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create("settings", function (Blueprint $table) {
            $table
                ->string("setting")
                ->unique()
                ->primary();
            $table->string("group")->nullable();
            $table->text("description")->nullable();
            $table->text("value")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("settings");
    }
}
