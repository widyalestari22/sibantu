<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;

    protected $table = "tb_persyaratan";
    protected $primaryKey = "id_persyaratan";
    protected $fillable = [
        'id_persyaratan',
        'persyaratan'
    ];
}
