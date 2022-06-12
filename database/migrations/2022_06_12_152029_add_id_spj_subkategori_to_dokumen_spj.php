<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdSpjSubkategoriToDokumenSpj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumen_spj', function (Blueprint $table) {
            $table->unsignedBigInteger('id_subkategori')->after('id');
            $table->foreign('id_subkategori')->references('id')->on('dokumen_spj');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokumen_spj', function (Blueprint $table) {
            //
        });
    }
}
