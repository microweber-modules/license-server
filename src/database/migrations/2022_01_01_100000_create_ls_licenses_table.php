<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('licenses')) {
            Schema::create('licenses', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->integer('user_id');
                $table->integer('created_by')->nullable();

                $table->string('domain', 200)->nullable()->unique();
                $table->uuid('license_key')->unique();
                $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');
                $table->dateTime('expiration_date')->nullable();
                $table->boolean('is_trial')->default(false);
                $table->boolean('is_lifetime')->default(false);

                $table->softDeletes();
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
        if (Schema::hasTable('licenses')) {
            Schema::table('licenses', function (Blueprint $table) {
                $table->dropIfExists();
            });
        }
    }
}
