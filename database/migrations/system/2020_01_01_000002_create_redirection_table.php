<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\UsesSystemConnection;

class CreateRedirectionTable extends Migration
{
    use UsesSystemConnection;
    public function up()
    {
        Schema::create("redirections", function (Blueprint $table) {
            $table->string("from")->unique();
            $table->string("to");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("redirections");
    }
}
