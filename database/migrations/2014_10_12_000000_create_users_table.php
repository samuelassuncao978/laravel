<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("users", function (Blueprint $table) {
            $table->uuid("id");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("preferred_name")->nullable();
            $table->uuid("photo")->nullable();

            $table->string("email")->unique();
            $table->json("phone")->nullable();
            $table->json("address")->nullable();
            $table->date("date_of_birth")->nullable();

            $table->timestamp("email_verified_at")->nullable();
            $table->string("password");
            $table->string("timezone")->nullable();

            $table->boolean("notification_sounds")->default(true);
            $table->boolean("notification_summaries")->default(true);
            $table->boolean("messenger_client_can_initiate")->default(true);
            $table->boolean("messenger_sounds")->default(true);
            $table->boolean("messenger_summaries")->default(true);
            $table->boolean("invisible")->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("users");
    }
}
