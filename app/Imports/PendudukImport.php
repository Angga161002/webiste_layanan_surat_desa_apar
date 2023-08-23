<?php

namespace App\Imports;

use App\Models\Penduduk;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash; // Import class Hash
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendudukImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return Penduduk|null
     */
    public function model(array $row)
    {
        if (!isset($row['password'])) {
            throw new \Exception("Kolom password tidak ditemukan.");
        }

        $password = Hash::make($row['password']);

        return new Penduduk([
            'nik' => $row['nik'],
            'name' => $row['name'],
            'email' => $row['email'],
            'pekerjaan' => $row['pekerjaan'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'tempat_lahir' => $row['tempat_lahir'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'alamat' => $row['alamat'],
            'agama' => $row['agama'],
            'no_hp' => $row['no_hp'],
            'password' => $password, // Gunakan password yang sudah di-hash
        ]);
    }
}
