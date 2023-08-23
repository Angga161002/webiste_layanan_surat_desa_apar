<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'name',
        'tempat_lahir',
        'jenis_kelamin',
        'alamat',
        'password', // Tambahkan field password ke dalam fillable
    ];
}
