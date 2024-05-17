<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_ptnbh',
        'tentang_ptnbh',
        'sambutan_rektor',
        'gambar_rektor',
    ];
}
