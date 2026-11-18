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
        Schema::create('aksesi_perlakuan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('aksesi_benih_id')
                ->constrained('aksesi_benih')
                ->cascadeOnDelete();

            $table->foreignId('perlakuan_penyimpanan_id')
                ->constrained('perlakuan_penyimpanan')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique([
                'aksesi_benih_id',
                'perlakuan_penyimpanan_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aksesi_perlakuan');
    }
};
