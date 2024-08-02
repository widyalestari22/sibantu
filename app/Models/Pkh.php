<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class Pkh extends Model
{
    use HasFactory;

    protected $table = 'tb_pkh';

    protected $primaryKey = 'id_pkh';

    protected $fillable = [
        'id_pkh',
        'nama_penerima',
        'nik',
        'rt',
        'rw',
        'alamat',
        'keterangan',
        'alasan'
    ];
    public function Penyaluran()
    {
        return $this->belongsTo(PenyaluranPkh::class, 'id_penyaluran');
    }
    public static function statusPKH()
    {
        return self::where('id_pkh'); // Ganti 'your_status_value' dengan nilai yang sesuai
    }
    public function scopePkhById($query, $id)
    {
        return $query->where('id_pkh', $id);
    }
}

        // public function setJawabanAlasanAttribute($value)
        // {
        //     // Menggunakan tanda pemisah untuk memisahkan 'jawaban' dan 'alasan'
        //     $this->attributes['jawaban_alasan'] = $value['jawaban'] . '|' . $value['alasan'];
        // }

        // // Method untuk mengambil 'jawaban' dan 'alasan' dari kolom 'jawaban_alasan'
        // public function getJawabanAttribute()
        // {
        //     // Memisahkan 'jawaban' dan 'alasan' dari nilai 'jawaban_alasan'
        //     $jawabanAlasan = explode('|', $this->attributes['jawaban_alasan']);

        //     return [
        //         'jawaban' => $jawabanAlasan[0],
        //         'alasan' => $jawabanAlasan[1]
        //     ];
        // }