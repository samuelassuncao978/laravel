<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("clients", function (Blueprint $table) {
            $table->uuid("id");

            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("preferred_name")->nullable();
            $table->date("date_of_birth")->nullable();
            $table->string("sex")->nullable();
            $table->string("pronouns")->nullable();
            $table->string("sexual_orientation")->nullable();
            $table->uuid("photo")->nullable();

            $table->string("occupation")->nullable();
            $table->uuid("employer")->nullable();

            $table->string("email")->nullable();
            $table->timestamp("email_verified_at")->nullable();
            $table->json("address")->nullable();
            $table->json("phone")->nullable();

            $table->uuid("doctor")->nullable();

            $table->string("password");
            $table->string("timezone")->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists("clients");
    }
}
