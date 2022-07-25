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
        Schema::create('sub_unit', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('unit_id')
                ->constrained()
                ->unique()
                ->reference('id')
                ->on('unit_kerja')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name_sub');
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
        Schema::dropIfExists('profile_admin');
    }
};
