<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\UsesSystemConnection;

class CreateRecordsTable extends Migration
{
    use UsesSystemConnection;
    public function up()
    {
        Schema::create("records", function (Blueprint $table) {
            $table->uuid("id");
            $table->string("description");
            $table->string("plan");
            $table->bigInteger("qty")->default(0);
            $table->bigInteger("cost")->default(0);
            $table->bigInteger("subtotal")->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists("records");
    }
}
