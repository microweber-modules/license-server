<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsLicensedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable("ls_licensed_products")) {
            Schema::create("ls_licensed_products", function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->integer('licensable_id');
                $table->string('licensable_type');
                $table->string('licensable_prefix');

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
        if (Schema::hasTable("ls_licensed_products")) {
            Schema::table("ls_licensed_products", function (Blueprint $table) {
                $table->dropIfExists();
            });
        }
    }
}
