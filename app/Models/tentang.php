<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tentang extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_sejarah_id',
        'judul_sejarah_en',
        'judul_tujuan_id',
        'judul_tujuan_en',
        'isi_sejarah_id',
        'isi_sejarah_en',
        'judul_misi_id',
        'judul_visi_eng',
        'visi_id',
        'misi_id',
        'visi_eng',
        'misi_eng',
        'tujuan_id',
        'tujuan_en',

    ];
}
