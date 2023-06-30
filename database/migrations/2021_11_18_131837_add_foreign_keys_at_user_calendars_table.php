<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysAtUserCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->primary('id');
        });
        
        Schema::table('calendars', function (Blueprint $table) {
            $table->primary('id');
        });

        Schema::table('user_calendars', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table
                ->foreign('calendar_id')
                ->references('id')
                ->on('calendars')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropPrimary('id');
        });
        
        Schema::table('calendars', function (Blueprint $table) {
            $table->dropPrimary('id');
        }); 

        Schema::table('user_calendars', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['calendar_id']);
        });
    }
}
