<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeOnChannelRecordsAndEnterDepotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channel_records', function (Blueprint $table) {
            $table->string('url')->nullable()->comment('登入网址')->change();
        });
        Schema::table('enter_depots', function (Blueprint $table) {
            $table->string('url')->nullable()->comment('登入网址')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
