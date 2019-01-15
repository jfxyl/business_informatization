<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('record_area')->comment('备案区域');
            $table->string('record_user')->comment('备案人');
            $table->timestamp('record_at')->comment('备案时间');
            $table->string('record_unit')->comment('备案单位');
            $table->string('record_aptitude')->comment('备案资质');
            $table->string('record_channel')->comment('备案渠道及数量');
            $table->string('url')->comment('登入网址');
            $table->string('record_channel_user')->comment('备案渠道责任人');
            $table->string('record_legal_person')->comment('备案法人');
            $table->string('bond_type_money')->comment('保证金类型及金额');
            $table->string('bond_submit_person')->comment('保证金提交人');
            $table->string('enter_type_result')->comment('入库类型及结果');
            $table->string('is_set_filiale')->comment('是否设立分公司');
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
        Schema::dropIfExists('channel_records');
    }
}
