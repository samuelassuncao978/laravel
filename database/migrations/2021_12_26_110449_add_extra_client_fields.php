<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraClientFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("clients", function (Blueprint $table) {
            //
            $table->string("next_of_kin")->nullable();
            $table->text("allergies")->nullable();
            $table->text("medication")->nullable();
            $table->string("medicare")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("clients", function (Blueprint $table) {
            //
            $table->dropColumn("next_of_kin");
            $table->dropColumn("allergies");
            $table->dropColumn("medication");
            $table->dropColumn("medicare");
        });
    }
}
