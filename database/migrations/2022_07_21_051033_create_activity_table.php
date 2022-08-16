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
        Schema::create('activity', function (Blueprint $table) {
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
            $table->foreignId('profile_id')
                ->constrained()
                ->unique()
                ->reference('id')
                ->on('profile')
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
            $table->date('date_act');
            $table->string('desc_act', 255);
            $table->integer('time_act');
            $table->integer('quantitiy_act');
            $table->string('status_act');
            $table->string('alasan_act')->nullable();
            $table->string('docs_act')->nullable();
            $table->string('quant_desc');
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
        Schema::dropIfExists('activity');
    }
};
