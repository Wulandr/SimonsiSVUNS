<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRpd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpd', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pagu');
            $table->integer('tw_1');
            $table->integer('tw_2');
            $table->integer('tw_3');
            $table->integer('tw_4');
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
        Schema::dropIfExists('rpd');
    }
}
