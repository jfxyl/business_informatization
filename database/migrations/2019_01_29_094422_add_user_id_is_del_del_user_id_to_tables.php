<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdIsDelDelUserIdToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channel_records', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('id');
            $table->boolean('is_del')->default(false);
            $table->integer('del_user_id')->nullable();
        });
        Schema::table('enter_depots', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('id');
            $table->boolean('is_del')->default(false);
            $table->integer('del_user_id')->nullable();
        });
        Schema::table('win_bids', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('id');
            $table->boolean('is_del')->default(false);
            $table->integer('del_user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channel_records', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('is_del');
            $table->dropColumn('del_user_id');
        });
        Schema::table('enter_depots', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('is_del');
            $table->dropColumn('del_user_id');
        });
        Schema::table('win_bids', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('is_del');
            $table->dropColumn('del_user_id');
        });
    }
}
