<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrakingDailyDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traking__daily__datas', function (Blueprint $table) {
            $table->increments('id');
            $table->double('open', 15, 8);
            $table->double('high', 15, 8);
            $table->double('low', 15, 8);
            $table->double('close', 15, 8);
            $table->string('volume');
            $table->date('datetime'); 
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
        Schema::dropIfExists('traking__daily__datas');
    }
}
