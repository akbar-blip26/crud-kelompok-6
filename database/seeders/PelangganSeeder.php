<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        // Menambahkan 5 data pelanggan contoh
        $data = [
            [
                'nama' => 'Andi',
                'alamat' => 'Jakarta',
                'email' => 'andi@gmail.com',
                'kategori' => 'Umum',
                'tanggal_daftar' => '2026-10-01',
                'keterangan' => 'Pelanggan baru',
            ],
            [
                'nama' => 'Budi',
                'alamat' => 'Bandung',
                'email' => 'budi@gmail.com',
                'kategori' => 'VIP',
                'tanggal_daftar' => '2026-10-02',
                'keterangan' => 'Pelanggan prioritas',
            ],
            [
                'nama' => 'Citra',
                'alamat' => 'Bogor',
                'email' => 'citra@gmail.com',
                'kategori' => 'Member',
                'tanggal_daftar' => '2026-10-03',
                'keterangan' => 'Pelanggan member',
            ],
            [
                'nama' => 'Deni',
                'alamat' => 'Depok',
                'email' => 'deni@gmail.com',
                'kategori' => 'Umum',
                'tanggal_daftar' => '2026-10-04',
                'keterangan' => 'Pelanggan reguler',
            ],
            [
                'nama' => 'Eka',
                'alamat' => 'Tangerang',
                'email' => 'eka@gmail.com',
                'kategori' => 'VIP',
                'tanggal_daftar' => '2026-10-05',
                'keterangan' => 'Pelanggan prioritas',
            ],
        ];

        foreach ($data as $pelanggan) {
            Pelanggan::create($pelanggan);
        }

        // Membuat 20 data pelanggan otomatis menggunakan Factory
        Pelanggan::factory()->count(20)->create();
    }
}