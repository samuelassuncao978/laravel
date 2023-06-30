<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\UsesSystemConnection;

class CreatePluginsTable extends Migration
{
    use UsesSystemConnection;
    public function up()
    {
        Schema::create("plugins", function (Blueprint $table) {
            $table
                ->string("id")
                ->unique()
                ->primary();
            $table->json("manifest")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists("plugins");
    }
}
