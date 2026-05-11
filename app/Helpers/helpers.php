<?php

use App\Models\CompanyProfile;

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

function phoneNumber($phone_number)
{
    $phoneNumber = preg_replace('/[^0-9]/', '', $phone_number);

    if (strlen($phoneNumber) > 10) {
        $countryCode = substr($phoneNumber, 0, strlen($phoneNumber) - 11);
        $areaCode = substr($phoneNumber, -11, 4);
        $nextThree = substr($phoneNumber, -7, 4);
        $lastFour = substr($phoneNumber, -4, 4);

        $phoneNumber = '+' . $countryCode . ' ' . $areaCode . '-' . $nextThree . '-' . $lastFour;
    } elseif (strlen($phoneNumber) == 10) {
        $areaCode = substr($phoneNumber, 0, 3);
        $nextThree = substr($phoneNumber, 3, 3);
        $lastFour = substr($phoneNumber, 6, 4);

        $phoneNumber = '(' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
    } elseif (strlen($phoneNumber) == 7) {
        $nextThree = substr($phoneNumber, 0, 3);
        $lastFour = substr($phoneNumber, 3, 4);

        $phoneNumber = $nextThree . '-' . $lastFour;
    }

    return $phoneNumber;
}

function companyProfile()
{
    return CompanyProfile::first();
}
