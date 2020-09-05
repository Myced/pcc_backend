<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaryYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diary_years', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->boolean('is_available')->default(true);
            $table->timestamp('available_date')->nullable();
            $table->string('content_uploaded')->default(false);
            $table->string('purchase_item_id')->nullable();
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
        Schema::dropIfExists('diary_years');
    }
}
