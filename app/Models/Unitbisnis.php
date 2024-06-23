<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unitbisnis extends Model
{
    use HasFactory;
    protected $table = 'unitbisnis';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'nama_id',
        'nama_en',  
        'deskripsi_id',
        'deskripsi_en',
    ];
}
