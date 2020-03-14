<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUraianPekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uraian_pekerjaan', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('kategori_pekerjaan_id');
            $table->foreign('kategori_pekerjaan_id')
                ->references('id')
                ->on('kategori_pekerjaan')
                ->onDelete('cascade');

            $table->text('deskripsi');

            $table->string('volume_nilai');
            $table->string('volume_satuan');

            $table->unsignedBigInteger('harga');

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
        Schema::dropIfExists('uraian_pekerjaan');
    }
}
