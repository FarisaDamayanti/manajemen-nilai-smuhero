<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mapel'
    ];

    public function gurus()
    {
        return $this->hasMany(Guru::class, 'id_mapel');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_mapel');
    }
}
