<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExternalIdInCalendarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calendar_events', function (Blueprint $table) {
            $table->string('external_id')->after('id')->comment('An external id of the event to link with its remote copy');
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
            $table->dropColumn('external_id');
        });
    }
}
