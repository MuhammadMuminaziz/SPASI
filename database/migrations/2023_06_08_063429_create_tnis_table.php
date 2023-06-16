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
        Schema::create('tnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kesatuan_id');
            $table->foreignId('jabatan_id');
            $table->foreignId('usulan_tni_id')->nullable();
            $table->foreignId('surat_sk_id')->nullable();
            $table->string('gol_jab');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('pangkat');
            $table->string('korps');
            $table->bigInteger('nrp');
            $table->date('tgl_lahir');
            $table->string('sumber')->nullable();
            $table->date('tmt_tni')->nullable();
            $table->date('tmt_pangkat')->nullable();
            $table->date('tmt_jabatan')->nullable();
            $table->string('tmt_lama')->nullable();
            $table->date('tmt_kodam')->nullable();
            $table->string('kep_kasad')->nullable();
            $table->string('kep_pangam')->nullable();
            $table->string('dikum')->nullable();
            $table->string('lulus_dikum')->nullable();
            $table->string('dikbangum')->nullable();
            $table->string('lulus_dikbangum')->nullable();
            $table->text('ket')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_usulan')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tnis');
    }
};
