<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->foreign('nik')->references('nik')->on('masyarakat')->onUpdateCascade()->onDeleteCascade();
        });
        Schema::table('tanggapan', function (Blueprint $table) {
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->onUpdateCascade()->onDeleteCascade();
            $table->foreign('id_pengaduan')->references('id_pengaduan')->on('pengaduan')->onUpdateCascade()->onDeleteCascade();
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        //
    }
};
