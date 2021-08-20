<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitcoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitcoins', function (Blueprint $table) {
            $table->id();
            $table->string('coin_name')->comment('虛擬幣名稱');
            $table->string('celling_price_24H')->comment('24小時最高價');
            $table->string('best_price_24H')->comment('24小時最低價');
            $table->string('volume')->comment('成交量');
            $table->string('time')->comment('時間');
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
        Schema::dropIfExists('bitcoins');
    }
}
