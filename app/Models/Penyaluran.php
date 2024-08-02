<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penyaluran extends Model
{
    use HasFactory;
    protected $table = 'tb_penyaluran';

    protected $primaryKey = 'id_penyaluran';


    protected $fillable = [
        'tanggal_penyaluran',
        'jumlah_bantuan',
        'id_penerima',
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
        return $this->belongsTo(Penerima::class, 'id_penerima', 'id_penerima');
    }
}