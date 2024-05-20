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
        'isi_sejarah_id',
        'isi_sejarah_id',
        'visi_id',
        'misi_id',
        'visi_eng',
        'misi_eng',

    ];
}
