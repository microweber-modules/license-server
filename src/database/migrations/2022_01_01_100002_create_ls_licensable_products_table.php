<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsLicensableProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable("ls_licensable_products")) {
            Schema::create("ls_licensable_products", function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->morphs('licensable');

                $table->integer('license_id')->nullable();

                $table->integer('user_id')->nullable();

                $table->index(['licensable_id', 'licensable_type']);

                $table->unique(
                    ['license_id', 'licensable_id', 'licensable_type'],
                    'ls_licensable_products_licensable_type_licensable_id_index'
                );

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
        if (Schema::hasTable("ls_licensable_products")) {
            Schema::table("ls_licensable_products", function (Blueprint $table) {
                $table->dropIfExists();
            });
        }
    }
}
