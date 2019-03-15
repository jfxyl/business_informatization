<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAndAddOnWinBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('win_bids', function (Blueprint $table) {
            $table->string('win_bid_publicity')->nullable()->comment('中标公告')->change();
            $table->string('achievement_unit')->nullable()->comment('业绩所在单位')->after('is_up_to_par');
            $table->string('contract_date_remark')->nullable()->comment('合同日期备注')->after('remark');
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
