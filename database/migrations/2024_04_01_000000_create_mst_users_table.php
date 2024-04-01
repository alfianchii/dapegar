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
        Schema::create('mst_users', function (Blueprint $table) {
            $table->id("id_user");
            $table->string('nip', 11)->unique();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->enum('gender', ["L", "P"]);
            $table->string('telepon', 13)->unique();
            $table->string('email')->unique();
            $table->string('npwp', 25)->nullable()->unique();
            $table->unsignedBigInteger('id_golongan_pangkat');
            $table->unsignedBigInteger('id_eselon');
            $table->unsignedBigInteger('id_jabatan');
            $table->unsignedBigInteger('id_lokasi_kerja');
            $table->unsignedBigInteger('id_unit_kerja');
            $table->unsignedBigInteger('id_agama');
            $table->string('foto_profil')->nullable();
            $table->string('password');
            $table->enum('role', ["superadmin", "officer"]);
            $table->timestamp('email_verified_at')->nullable();

            $table->foreign('id_golongan_pangkat')
                ->references('id_golongan_pangkat')
                ->on('mst_golongan_pangkat')
                ->onDelete('restrict');

            $table->foreign('id_eselon')
                ->references('id_eselon')
                ->on('mst_eselon')
                ->onDelete('restrict');

            $table->foreign('id_jabatan')
                ->references('id_jabatan')
                ->on('mst_jabatan')
                ->onDelete('restrict');

            $table->foreign('id_lokasi_kerja')
                ->references('id_lokasi_kerja')
                ->on('mst_lokasi_kerja')
                ->onDelete('restrict');

            $table->foreign('id_unit_kerja')
                ->references('id_unit_kerja')
                ->on('mst_unit_kerja')
                ->onDelete('restrict');

            $table->foreign('id_agama')
                ->references('id_agama')
                ->on('mst_agama')
                ->onDelete('restrict');

            $table->string("created_by")->nullable();
            $table->string("updated_by")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};