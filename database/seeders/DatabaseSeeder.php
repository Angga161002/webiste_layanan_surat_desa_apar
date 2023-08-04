<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pegawai;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Pegawai Seeder
        Factory::factoryForModel(Pegawai::class)->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'no_hp' => '081372281811',
            'password' => Hash::make('123456'),
        ]);
        Factory::factoryForModel(Pegawai::class)->create([
            'username' => 'syahbandar',
            'email' => 'syahbandar@gmail.com',
            'no_hp' => '081372281810',
            'password' => Hash::make('123456'),
        ]);
        Factory::factoryForModel(Pegawai::class)->create([
            'username' => 'pujangga',
            'email' => 'pujangga@gmail.com',
            'no_hp' => '081372281812',
            'password' => Hash::make('123456'),
        ]);

        //Penduduk Seeder
        Factory::factoryForModel(Penduduk::class)->create([
            'nik' => '1377021610020001',
            'name' => 'Penduduk',
            'password' => Hash::make('123456'),
        ]);
        Factory::factoryForModel(Penduduk::class)->create([
            'nik' => '1377021610020002',
            'name' => 'Syahbandar',
            'password' => Hash::make('123456'),
        ]);
        Factory::factoryForModel(Penduduk::class)->create([
            'nik' => '1377021610020003',
            'name' => 'Pujangga',
            'password' => Hash::make('123456'),
        ]);
    }
}
