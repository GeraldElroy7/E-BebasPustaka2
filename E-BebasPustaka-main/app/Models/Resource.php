<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
       'nama', 'nid', 'status', 'institusi', 'email', 'no_hp', 'kategori', 'judul', 'pengarang', 'tahun', 'link', 'keterangan', 'ktp', 'size'
    ];
    protected $attributes = [
        'selesai' => false,
    ];
    protected $table = 'resource';


    public function user()
    {
        return $this->belongsTo(User::class, 'id_pustakawan');
    }

    
}
