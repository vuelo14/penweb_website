<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            // Hapus kolom yang tidak diperlukan (jika ada)
            $table->dropColumn(['nama']);
            
            // Tambah kolom baru
            // $table->string('nim')->unique()->after('id');
            // $table->enum('jk', ['Laki-laki', 'Perempuan'])->after('nim');
            // $table->string('prodi')->after('jk');
            $table->date('tgl_lahir')->after('prodi');
            $table->boolean('nonreg')->default(false)->after('tgl_lahir');
        });
    }

    public function down()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropColumn(['nim', 'jk', 'prodi', 'tgl_lahir', 'nonreg']);
        });
    }
};