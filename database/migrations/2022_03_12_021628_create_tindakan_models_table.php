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
        Schema::create('tindakan_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagihan_id');
            $table->foreignId('pasien_id');
            $table->foreignId('obat_id');
            $table->string('tindakan');
            $table->string('keluhan');
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
        Schema::dropIfExists('tindakan_models');
    }
};
