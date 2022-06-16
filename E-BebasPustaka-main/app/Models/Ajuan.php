<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajuan extends Model
{
    use HasFactory;
    protected $table = 'ajuan';

    protected $fillable = [
        'id_opr_publish',
        'opr_publish',
        'tgl_publish',
        'id_opr_validasi',
        'opr_validasi',
        'tgl_validasi',
        'id_opr_aktivasi',
        'opr_aktivasi',
        'tgl_aktivasi',
        'id_opr_terima_ta',
        'opr_terima_ta',
        'tgl_terima_ta',
        'id_opr_bp',
        'opr_bp',
        'tgl_bp',
        'link_repo'
     ];
     
     public function mahasiswa()
     {
         return $this->hasOne(Mahasiswa::class, 'mahasiwa_id');
     }
}
