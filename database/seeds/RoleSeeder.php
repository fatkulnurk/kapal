<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \Spatie\Permission\Models\Role::create(['name' => \App\Enums\RoleEnum::$admin]);
        $role = \Spatie\Permission\Models\Role::create(['name' => \App\Enums\RoleEnum::$managerProduksi]);
        $role = \Spatie\Permission\Models\Role::create(['name' => \App\Enums\RoleEnum::$owner]);
    }
}
