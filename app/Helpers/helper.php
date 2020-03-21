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

        return md5($data);
    }
}
