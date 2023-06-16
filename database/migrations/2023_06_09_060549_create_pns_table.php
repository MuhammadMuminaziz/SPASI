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
        Schema::create('pns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kesatuan_id')->nullable();
            $table->foreignId('jabatan_id');
            $table->foreignId('usulan_pns_id')->nullable();
            $table->foreignId('surat_sk_id')->nullable();
            $table->bigInteger('nip')->unique();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('pangkat');
            $table->date('tgl_lahir');
            $table->string('dikum');
            $table->string('lulus_dikum');
            $table->string('dikjang');
            $table->string('lulus_dikjang');
            $table->string('kep_jab')->nullable();
            $table->date('tgl_kep_jab')->nullable();
            $table->boolean('is_usulan')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pns');
    }
};
