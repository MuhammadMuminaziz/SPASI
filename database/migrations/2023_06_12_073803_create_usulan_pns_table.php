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
        Schema::create('usulan_pns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pns_id')->nullable();
            $table->foreignId('note_pns_id')->nullable();
            $table->string('dpcp')->nullable();
            $table->string('kep_cpns')->nullable();
            $table->string('kep_pns')->nullable();
            $table->string('kep_pangkat')->nullable();
            $table->string('akte_nikah')->nullable();
            $table->string('akte_anak')->nullable();
            $table->string('sp_hd')->nullable();
            $table->string('sk_kematian')->nullable();
            $table->string('kk')->nullable();
            $table->string('kgb')->nullable();
            $table->string('ppk')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usulan_pns');
    }
};
