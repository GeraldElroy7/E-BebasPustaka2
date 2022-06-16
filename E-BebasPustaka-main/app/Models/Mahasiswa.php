<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nrp',
        'email',
        'nama',
        'telp',
        'jenjang',
        'fakultas',
        'departemen',
        'judulTA',
        'status',
        'password',
     ];

     protected $hidden = [
        'password',
    ];
     
     public function ajuan()
     {
         return $this->hasOne(Ajuan::class, 'mahasiswa_id');
     }
}
