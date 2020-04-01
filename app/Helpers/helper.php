<?php
if (!function_exists('currency_formatter')) {
    function currency_formatter($nominal, $decimal = true)
    {
        if ($decimal) {
            return number_format($nominal,0,",",".");
        }

        return number_format($nominal,2,",",".");
    }
}

if (!function_exists('random_perbaikan')) {
    function random_perbaikan()
    {
        try {
            $data = \Ramsey\Uuid\Uuid::getFactory()->uuid4();
        } catch (Exception $e) {
            $data = \Illuminate\Support\Str::random(30);
        }

        return \Illuminate\Support\Str::substr(md5($data), 0, 10);
    }
}

if (!function_exists('role_owner')) {
    function role_owner()
    {
        return \App\Enums\RoleEnum::$owner;
    }
}

if (!function_exists('role_biaya_kalkulasi')) {
    function role_biaya_kalkulasi()
    {
        return \App\Enums\RoleEnum::$biayaKalkulasi;
    }
}

if (!function_exists('role_manager_produksi')) {
    function role_manager_produksi()
    {
        return \App\Enums\RoleEnum::$managerProduksi;
    }
}
