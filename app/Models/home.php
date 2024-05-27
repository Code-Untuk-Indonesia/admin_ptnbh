<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_ptnbh_id',
        'judul_ptnbh_en',
        'tentang_ptnbh_id',
        'tentang_ptnbh_en',
        'judul_rektor_id',
        'judul_rektor_en',
        'nama_rektor',
        'sambutan_rektor_id',
        'sambutan_rektor_en',
        'gambar_rektor',
    ];
}
