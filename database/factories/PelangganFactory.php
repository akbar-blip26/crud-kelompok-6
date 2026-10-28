<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PelangganFactory extends Factory
{
    public function definition(): array
    {
        $nama = [
            'Andi Saputra',
            'Budi Santoso',
            'Citra Lestari',
            'Deni Firmansyah',
            'Eka Putri',
            'Fajar Ramadhan',
            'Gina Maharani',
            'Hadi Wijaya',
            'Rizky Pratama',
            'Siti Aisyah',
        ];

        $alamat = [
            'Jl. Merdeka No. 10, Jakarta',
            'Jl. Sudirman No. 15, Bandung',
            'Jl. Melati No. 20, Bogor',
            'Jl. Mawar No. 8, Depok',
            'Jl. Kenanga No. 12, Tangerang',
            'Jl. Pahlawan No. 5, Bekasi',
        ];

        return [
            'nama' => fake()->randomElement($nama),
            'alamat' => fake()->randomElement($alamat),
            'email' => fake()->unique()->safeEmail(),
            'kategori' => fake()->randomElement([
                'Umum',
                'VIP',
                'Member',
            ]),
            'tanggal_daftar' => fake()->date(),
            'keterangan' => fake()->randomElement([
                'Pelanggan baru',
                'Pelanggan tetap',
                'Pelanggan aktif',
                'Pelanggan prioritas',
                'Pelanggan reguler',
            ]),
        ];
    }
}