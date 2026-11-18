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
        Schema::create('asal_pengumpulan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('aksesi_benih_id')
                ->unique()
                ->constrained('aksesi_benih')
                ->cascadeOnDelete();

            $table->string('provinsi', 100);
            $table->string('kabupaten_kota', 100);
            $table->string('kecamatan', 100)->nullable();
            $table->string('desa', 100)->nullable();
            $table->date('tanggal_pengumpulan');
            $table->string('nama_pengumpul', 100)->nullable();
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asal_pengumpulan');
    }
};
