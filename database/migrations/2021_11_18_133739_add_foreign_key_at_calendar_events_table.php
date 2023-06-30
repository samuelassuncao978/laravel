<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyAtCalendarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calendar_events', function (Blueprint $table) {
            $table->primary('id');

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
        Schema::table('calendar_events', function (Blueprint $table) {
            $table->dropPrimary('id');
        }); 

        Schema::table('calendar_events', function (Blueprint $table) {
            $table->dropForeign(['calendar_id']);
        });
    }
}
