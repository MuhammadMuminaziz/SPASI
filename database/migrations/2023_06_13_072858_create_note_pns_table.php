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
        Schema::create('note_pns', function (Blueprint $table) {
            $table->id();
            $table->string('note_dpcp')->nullable();
            $table->string('note_kep_cpns')->nullable();
            $table->string('note_kep_pns')->nullable();
            $table->string('note_kep_pangkat')->nullable();
            $table->string('note_akte_nikah')->nullable();
            $table->string('note_akte_anak')->nullable();
            $table->string('note_sp_hd')->nullable();
            $table->string('note_sk_kematian')->nullable();
            $table->string('note_kk')->nullable();
            $table->string('note_kgb')->nullable();
            $table->string('note_ppk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note_pns');
    }
};
