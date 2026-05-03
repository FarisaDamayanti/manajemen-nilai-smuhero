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
        return $this->belongsTo(User::class, 'id_user'); //guru hanya memiliki 1 user
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_guru'); //guru punya banyak nilai
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'guru_kelas', 'id_guru', 'id_kelas');
    }
}
