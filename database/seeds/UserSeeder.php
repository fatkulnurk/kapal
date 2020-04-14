<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'biaya kalkulasi',
                'email' => 'bagian_kalkulasi@example.com',
                'email_verified_at' => \Illuminate\Support\Carbon::now(),
                'password' => \Illuminate\Support\Facades\Hash::make('12345678')
            ],
            [
                'name' => 'manager produksi',
                'email' => 'manager_produksi@example.com',
                'email_verified_at' => \Illuminate\Support\Carbon::now(),
                'password' => \Illuminate\Support\Facades\Hash::make('12345678')
            ]
        ];

        $perusahaan = \App\Perusahaan::create([
            'nama' => 'PT. HUB MARITIM INDONESIA'
        ]);

        $user = \App\User::create([
            'name' => 'owner',
            'email' => 'owner@example.com',
            'email_verified_at' => \Illuminate\Support\Carbon::now(),
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
        $user->perusahaan()->associate($perusahaan);
        $user->save();
        $user->assignRole(\App\Enums\RoleEnum::$owner);
        unset($user);

        $user = \App\User::create($users[0]);
        $user->assignRole(\App\Enums\RoleEnum::$biayaKalkulasi);
        $user->perusahaan()->associate($perusahaan);
        $user->save();
        unset($user);

        $user = \App\User::create($users[1]);
        $user->assignRole(\App\Enums\RoleEnum::$managerProduksi);
        $user->perusahaan()->associate($perusahaan);
        $user->save();
        unset($user);

    }
}
