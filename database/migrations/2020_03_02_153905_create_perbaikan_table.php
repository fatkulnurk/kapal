<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbaikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbaikan', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nomor_transaksi', 120)->unique();
            $table->string('harga_setelah_penawaran')->nullable();

            $table->unsignedBigInteger('kapal_id');
            $table->foreign('kapal_id')
                ->references('id')
                ->on('kapal')
                ->onDelete('cascade');

            $table->timestamps();

        });
//        DB::statement("ALTER TABLE perbaikan AUTO_INCREMENT = 10000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perbaikan');
    }
}
