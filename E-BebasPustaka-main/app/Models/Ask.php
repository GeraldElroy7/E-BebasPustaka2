<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'status', 'email', 'no_hp', 'kategori', 'pertanyaan', 'selesai'
    ];
    protected $attributes = [
        'selesai' => false,
    ];
    protected $table = 'ask';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pustakawan');
    }
}
