<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id');
            $table->integer('berat_badan');
            $table->text('keluhan');
            $table->enum('status', array('sudah', 'belum'));
            $table->text('diagnosa')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamps();
            $table->boolean('status_pembayaran')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
