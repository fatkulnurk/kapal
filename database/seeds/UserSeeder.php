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
                'name' => 'admin',
                'email' => 'admin@example.com',
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

        $user = \App\User::create($users[0]);
        $user->assignRole(\App\Enums\RoleEnum::$admin);
        unset($user);

        $user = \App\User::create($users[1]);
        $user->assignRole(\App\Enums\RoleEnum::$managerProduksi);
        unset($user);
    }
}
