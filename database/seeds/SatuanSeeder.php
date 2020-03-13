<?php

use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuan = [
            '"', 'kali', 'set', 'M2', 'Ton', 'Mtr', 'kali', 'hari'
        ];

        foreach ($satuan as $item) {
            \App\Satuan::create(['nama' => $item]);
        }
    }
}
