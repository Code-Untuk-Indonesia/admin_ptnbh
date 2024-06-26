<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'judul_id',
        'judul_en',  
        'deskripsi_id',
        'deskripsi_en',
        'gambar',
        'tanggal_mulai',
        'tanggal_akhir',
        'waktu_agenda',
        'tempat_agenda'
    ];
}
