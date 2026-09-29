<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            [
                'npm' => '18429090',
                'nama' => 'CANTIK JELITA',
                'prodi' => 'TI',
                'tahunmasuk' => 2018,
                'created_at' => '2020-04-08 21:21:23',
                'updated_at' => null,
            ],
            [
                'npm' => '18428090',
                'nama' => 'GANTENG MAKSIMAL',
                'prodi' => 'SI',
                'tahunmasuk' => 2018,
                'created_at' => '2020-04-08 21:21:23',
                'updated_at' => null,
            ],
            [
                'npm' => '18326090',
                'nama' => 'CETAR MEMBAHANA',
                'prodi' => 'MI',
                'tahunmasuk' => 2018,
                'created_at' => '2020-04-08 21:21:23',
                'updated_at' => null,
            ],
            [
                'npm' => '18327090',
                'nama' => 'GLOWING',
                'prodi' => 'KA',
                'tahunmasuk' => 2018,
                'created_at' => '2020-04-08 21:21:23',
                'updated_at' => null,
            ],
        ]);
    }
}
