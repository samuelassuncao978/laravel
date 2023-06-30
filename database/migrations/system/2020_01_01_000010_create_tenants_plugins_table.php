<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\UsesSystemConnection;

class CreateTenantsPluginsTable extends Migration
{
    use UsesSystemConnection;
    public function up()
    {
        Schema::create("tenants_plugins", function (Blueprint $table) {
            $table->uuid("tenant_id");
            $table->uuid("plugin_id");
        });
    }

    public function down()
    {
        Schema::dropIfExists("tenants_plugins");
    }
}
