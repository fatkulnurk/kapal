<?php

use Illuminate\Database\Seeder;

class KategoriPekerjaanMaster extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoriPekerjaan = [
            'docking',
            'asistensi',
            'suplay aliran listrik',
            'mck',
            'kebersihan lambung dibawah garis air',
            'Pembersihan & Pengecatan lambung diatas garis air (top side)'
        ];

        foreach ($kategoriPekerjaan as $item) {
            \App\KategoriPekerjaanMaster::create(['nama' => $item]);
        }
    }
}
