<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unduh extends Model
{
    use HasFactory;

    protected $table = 'unduhs';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'judul_id',
        'judul_en',
        'file',
    ];

}
