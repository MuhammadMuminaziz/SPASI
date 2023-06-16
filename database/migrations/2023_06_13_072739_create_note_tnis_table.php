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
        Schema::create('note_tnis', function (Blueprint $table) {
            $table->id();
            $table->string('note_skep_pengangkatan')->nullable();
            $table->string('note_skep_pangkat')->nullable();
            $table->string('note_skep_pemberhentian')->nullable();
            $table->string('note_dcpp')->nullable();
            $table->string('note_srt_nikah')->nullable();
            $table->string('note_skep_milsuk')->nullable();
            $table->string('note_kpi')->nullable();
            $table->string('note_akte')->nullable();
            $table->string('note_photo')->nullable();
            $table->string('note_sk_tanggungan_keluarga')->nullable();
            $table->string('note_kta_asabri')->nullable();
            $table->string('note_npwp')->nullable();
            $table->string('note_tanda_jasa')->nullable();
            $table->string('note_sk_kuliah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note_tnis');
    }
};
