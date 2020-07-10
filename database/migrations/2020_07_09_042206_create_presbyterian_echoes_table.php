<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresbyterianEchoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presbyterian_echoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('month_name')->nullable();
            $table->string('purchase_item_id')->nullable();
            $table->string('file_name')->nullable();
            $table->string('path')->nullable();
            $table->string('url')->nullable();
            $table->string('hash')->nullable();
            $table->boolean('is_visible')->default(true);
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
        Schema::dropIfExists('presbyterian_echoes');
    }
}
