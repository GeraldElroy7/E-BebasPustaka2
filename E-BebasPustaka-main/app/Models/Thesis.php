<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'status', 'institusi', 'email', 'no_hp', 'kategori', 'judul', 'pengarang', 'tahun', 'link', 'keterangan', 'ktp', 'size'
     ];
     protected $attributes = [
         'selesai' => false,
     ];
    protected $table = 'thesis';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pustakawan');
    }

}
