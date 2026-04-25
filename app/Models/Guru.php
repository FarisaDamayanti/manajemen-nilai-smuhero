<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_mapel',
        'nip',
        'nama_lengkap',
        'alamat',
        'no_hp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_guru');
    }
}
