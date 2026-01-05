<?php

if (!function_exists('simplePrice')) {
    function simplePrice($price)
    {
        if ($price == 0) {
            return 'Nol Rupiah';
        }

        $result = '';
        $value = abs($price); // Ambil nilai absolut

        $juta = floor($value / 1000000);
        $sisa = $value % 1000000;
        $ribu = floor($sisa / 1000);
        $rupiah = $sisa % 1000;

        if ($juta > 0) {
            $result .= number_format($juta, 0, ',', '.') . ' Jt ';
        }
        if ($ribu > 0) {
            $result .= number_format($ribu, 0, ',', '.') . ' Ribu ';
        }
        // if ($rupiah > 0) {
        //     // Tambahkan "Ratus" jika diperlukan, atau langsung sisa rupiah
        //     $result .= number_format($rupiah, 0, ',', '.') . ' Rupiah ';
        // }

        return trim($result);
    }
}
