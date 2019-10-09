<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang', 80);
            $table->integer('jumlah_barang');
            $table->text('catatan_barang');
            $table->integer('proses_pengerjaan');
            $table->string('nama_pemesan', 50);
            $table->string('nomor_pemesan', 13);
            $table->string('email_pemesan', 50)->unique();
            $table->text('alamat_pemesan');
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
        Schema::dropIfExists('orders');
    }
}
