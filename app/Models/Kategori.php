<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "tb_kategori";

    protected $primaryKey = "id_kategori";
    protected $fillable = [
        'id_kategori',
        'nama_kategori'
    ];
    public function penerimaan()
    {
        return $this->belongsTo(Penerima::class, 'id_penerima', 'id_penerima');
    }
}
