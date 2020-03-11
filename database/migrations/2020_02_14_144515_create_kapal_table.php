<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKapalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kapal', function (Blueprint $table) {
            $table->bigIncrements('id');
            // pemilik
            $table->unsignedBigInteger('perusahaan_id');
            $table->foreign('perusahaan_id')
                ->references('id')
                ->on('perusahaan');

            $table->string('nama_kapal');
            $table->string('jenis_kapal');
            $table->string('ukuran_panjang');
            $table->string('ukuran_panjang_satuan')
                ->default('Mtr');
            $table->string('ukuran_lebar');
            $table->string('ukuran_lebar_satuan')
                ->default('"');
            $table->string('ukuran_tinggi');
            $table->string('ukuran_tinggi_satuan')
                ->default('"');
            $table->string('ukuran_sarat');
            $table->string('ukuran_sarat_satuan')
                ->default('"');
            $table->string('ukuran_gt');
            $table->string('ukuran_gt_satuan')
                ->default('Ton');

            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');

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
        Schema::drop('kapal');
    }
}
