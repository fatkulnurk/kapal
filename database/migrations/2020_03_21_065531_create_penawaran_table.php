<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenawaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('perbaikan_id');
            $table->foreign('perbaikan_id')
                ->references('id')
                ->on('perbaikan');

            $table->string('jumlah_penawaran');

            $table->unsignedBigInteger('perusahaan_id');
            $table->foreign('perusahaan_id')
                ->references('id')
                ->on('perusahaan');

            $table->text('user');

            $table->string('verified')->default('diproses');
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
        Schema::dropIfExists('penawarans');
    }
}
