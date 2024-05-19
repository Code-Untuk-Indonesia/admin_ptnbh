<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tentang extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_sejarah',
        'title_history',
        'isi_sejarah',
        'content_history',
        'visi',
        'misi',
        'visi_eng',
        'misi_eng',

    ];
}
