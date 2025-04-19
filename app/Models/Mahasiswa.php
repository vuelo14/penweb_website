<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'jk', 'prodi', 'tgl_lahir', 'nonreg'];
    
    // Jika Anda ingin format khusus untuk tanggal
    protected $casts = [
        'tgl_lahir' => 'date',
        'nonreg' => 'boolean'
    ];
}