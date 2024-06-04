<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'nama' => "EKONOMI",
                'kode_nama' => 'ekonomi'
            ],
            [
                'nama' => "NON EKONOMI",
                'kode_nama' => 'non_ekonomi'
            ]
        ];

        foreach ($arr as $item) {
            \App\Models\Master\JenisLayanan::create($item);
        }
    }
}
