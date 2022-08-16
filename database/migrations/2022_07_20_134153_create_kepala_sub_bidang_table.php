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
        Schema::create('kepala_sub_bidang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->unique()
                ->reference('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('unit_id')
                ->constrained()
                ->unique()
                ->reference('id')
                ->on('unit_kerja')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('sub_id')
                ->constrained()
                ->unique()
                ->reference('id')
                ->on('sub_unit')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('posisi_id')
                ->constrained()
                ->unique()
                ->reference('id')
                ->on('posisi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('fullname')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('handphone')->nullable();
            $table->string('religion')->nullable();
            $table->string('status')->nullable();
            $table->string('absen')->nullable();
            $table->string('npwp')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('alamat_lengkap')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kepala_sub_bidang');
    }
};
