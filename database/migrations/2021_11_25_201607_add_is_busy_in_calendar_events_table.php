<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsBusyInCalendarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calendar_events', function (Blueprint $table) {
            $table->boolean('is_busy')->default(0)->after('recurrence');
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
            $table->dropColumn('is_busy');
        });
    }
}
