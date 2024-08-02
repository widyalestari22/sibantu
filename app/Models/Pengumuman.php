<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = "tb_pengumuman";
    protected $primaryKey = "id_pengumuman";
    protected $fillable = [
        'id_pengumuman',
        'pengumuman',
        'judul',
        'status'
    ];
}