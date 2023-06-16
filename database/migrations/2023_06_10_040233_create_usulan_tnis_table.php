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
        Schema::create('usulan_tnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tni_id')->nullable();
            $table->foreignId('note_tni_id')->nullable();
            $table->string('skep_pengangkatan')->nullable();
            $table->string('skep_pangkat')->nullable();
            $table->string('skep_pemberhentian')->nullable();
            $table->string('dcpp')->nullable();
            $table->string('srt_nikah')->nullable();
            $table->string('skep_milsuk')->nullable();
            $table->string('kpi')->nullable();
            $table->string('akte')->nullable();
            $table->string('photo')->nullable();
            $table->string('sk_tanggungan_keluarga')->nullable();
            $table->string('kta_asabri')->nullable();
            $table->string('npwp')->nullable();
            $table->string('tanda_jasa')->nullable();
            $table->string('sk_kuliah')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usulan_tnis');
    }
};
