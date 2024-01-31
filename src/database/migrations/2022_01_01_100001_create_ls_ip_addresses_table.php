<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsIpAddressesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ls_ip_addresses')) {
            Schema::create('ls_ip_addresses', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->foreignId('license_id');
                $table->ipAddress('ip_address');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('ls_ip_addresses')) {
            Schema::table('ls_ip_addresses', function (Blueprint $table) {
                $table->dropIfExists();
            });
        }
    }
}
