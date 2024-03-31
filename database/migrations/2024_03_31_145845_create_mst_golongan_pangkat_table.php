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
        Schema::create('mst_golongan_pangkat', function (Blueprint $table) {
            $table->id("id_golongan_pangkat");
            $table->string("kode_golongan");
            $table->string("kode_ruang");
            $table->string("nama_pangkat")->unique();

            $table->string("created_by")->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_golongan_pangkat');
    }
};
