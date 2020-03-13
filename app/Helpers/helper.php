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
