<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterDepotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enter_depot', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->comment('公司名称');
            $table->string('record_user')->comment('备案人');
            $table->timestamp('record_at')->comment('备案时间');
            $table->string('record_unit')->comment('备案单位');
            $table->string('record_aptitude')->comment('备案资质');
            $table->string('enter_voucher')->comment('入库凭证');
            $table->string('url')->comment('登入网址');
            $table->string('record_channel_user')->comment('备案渠道责任人');
            $table->string('special_demand')->comment('特殊要求');
            $table->string('bond_type_money')->comment('保证金类型及金额');
            $table->string('bond_submit_person')->comment('保证金递交人');
            $table->string('enter_type_result')->comment('入库类型及结果');
            $table->string('is_annual_review')->comment('是否年审');
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
        Schema::dropIfExists('enter_depot');
    }
}
