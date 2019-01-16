<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('win_bid', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area')->comment('区域');
            $table->string('project_name')->comment('工程名称');
            $table->string('win_bid_price')->comment('中标价');
            $table->timestamp('contract_sign_at')->nullable()->comment('合同签订时间');
            $table->integer('work_days')->comment('工期');
            $table->timestamp('begin_at')->nullable()->comment('开工日期');
            $table->timestamp('end_at')->nullable()->comment('竣工日期');
            $table->string('project_index')->comment('主要工程指标');
            $table->string('project_type')->comment('工程类型');
            $table->string('project_manager')->comment('项目经理');
            $table->string('business_channel')->comment('经营渠道');
            $table->string('partner')->comment('合作者');
            $table->string('win_bid_publicity')->comment('中标公告');
            $table->string('is_end')->comment('是否竣工');
            $table->string('is_up_to_par')->comment('是否达标');
            $table->string('remark')->comment('备注');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('win_bid');
    }
}
