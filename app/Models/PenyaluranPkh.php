<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyaluranPkh extends Model
{
    use HasFactory;
    protected $table = 'tb_penyaluran_pkh';

    protected $primaryKey = 'id_penyaluran';


    protected $fillable = [
        'tanggal_penyaluran',
        'jumlah_bantuan',
        'id_pkh',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($penerimaBantuan) {
            // Isi kolom tanggal_penyaluran dengan tanggal saat ini
            $penerimaBantuan->tanggal_penyaluran = now();
        });
    }
    public function penerima()
    {
        return $this->belongsTo(Pkh::class, 'id_pkh', 'id_pkh');
    }
}
