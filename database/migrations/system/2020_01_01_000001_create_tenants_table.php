<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\UsesSystemConnection;

class CreateTenantsTable extends Migration
{
    use UsesSystemConnection;
    public function up()
    {
        Schema::create("tenants", function (Blueprint $table) {
            $table->uuid("id");
            $table->string("domain")->unique();
            $table->json("customer")->nullable();
            $table->boolean("force_https")->default(false);
            $table->timestamp("suspended_at")->nullable();
            $table->text("suspended_reason")->nullable();
            $table->timestamp("maintenance_at")->nullable();
            $table->text("maintenance_reason")->nullable();
            $table->text("database")->nullable();
            $table->string("plan")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists("tenants");
    }
}
