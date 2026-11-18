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
        Schema::create('aksesi_benih', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aksesi', 30)->unique();
            $table->string('nama_aksesi', 150);

            $table->foreignId('kelompok_tanaman_id')
                ->constrained('kelompok_tanaman')
                ->restrictOnDelete();

            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aksesi_benih');
    }
};
