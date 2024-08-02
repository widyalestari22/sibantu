<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;
    protected $table = 'tb_penerima';
    protected $primaryKey = 'id_penerima';
    protected $fillable = [

        'nama',
        'nik',
        'kelamin',
        'alamat',
        'rt',
        'rw',
        'nama_desa',
        'nama_kecamatan',
        'created_at',
        'updated_at'

    ];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function penyaluran()
    {
        return $this->belongsTo(Penyaluran::class, 'id_penyaluran', 'id_penyaluran');
    }

    public function scopePenerimaBLT($query)
    {
        return $query->where('id_penerima',); // Ganti 'your_status_column' dan 'your_status_value'
    }
    public function scopePenerimaById($query, $id)
    {
        return $query->where('id_penerima', $id);
    }
}
