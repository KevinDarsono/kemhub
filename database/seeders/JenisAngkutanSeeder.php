<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisAngkutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            'AKDP',
            'AKAP',
            'AJAP'
        ];

        foreach ($arr as $item) {
            \App\Models\Master\JenisAngkutan::create([
                'nama' => $item
            ]);
        }
    }
}
