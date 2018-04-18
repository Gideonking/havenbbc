<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdColumnToAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function ($table) {
            $table->integer('user_id');
            });
            Schema::table('ministries', function ($table) {
                $table->integer('user_id');
                });
                Schema::table('galleries', function ($table) {
                    $table->integer('user_id');
                    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function ($table) {
            $table->dropColumn('user_id');
            });
            Schema::table('ministries', function ($table) {
                $table->dropColumn('user_id');
                });
                Schema::table('galleries', function ($table) {
                    $table->dropColumn('user_id');
                    });
    }
}
