<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class);
    }

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
