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
        Schema::create('pendaftaran_obats', function (Blueprint $table) {
            $table->foreignId('pendaftaran_id')->constrained('pendaftarans', 'id');
            $table->foreignId('obat_herbal_id')->constrained('obat_herbals', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien_obats');
    }
};
