<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'organisasi_id',
        'isi_organisasi_id',
        'organisasi_en',
        'isi_organisasi_en'
    ];
}
