<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BuatResep', function (Blueprint $table) {
            $table->integer('id_buatResep')->autoIncrement();
            $table->string('kd_resep', 10);
            $table->string('kd_bahan', 10);
            $table->integer('jumlah', 10);
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
        Schema::dropIfExists('BuatResep');
    }
};