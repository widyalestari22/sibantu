<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'tb_pengajuan';

    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'nama',
        'nik',
        'kelamin',
        'alamat',
        'tanggal_lahir',
        'rt',
        'rw',
        'penghasilan',
        'tanpa_bantuan',
        'validasi',
        'tanggungan',
        'rumah',
        'elektronik',
        'tanah',
        'nama_desa',
        'nama_kecamatan',
        'kk',
        'ktp',
        'created_at',
        'updated_at'

    ];
    protected $casts = [
        'elektronik' => 'json',
    ];
}