<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriPekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_pekerjaan', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('perbaikan_id');
            $table->foreign('perbaikan_id')
                ->references('id')
                ->on('perbaikan')
                ->onDelete('cascade');

            $table->string('nama');
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('kategori_pekerjaan');
    }
}
