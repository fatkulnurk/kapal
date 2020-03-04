<?php

use Illuminate\Database\Seeder;

class JeniskapalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisKapal = ['kargo curah', 'kargo umum', 'container', 'tanker'];

        foreach ($jenisKapal as $item) {
            \App\JenisKapal::create(['nama' => $item]);
        }
    }
}
