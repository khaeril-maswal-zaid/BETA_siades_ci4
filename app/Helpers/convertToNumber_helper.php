<?php

function convertToNumber($letters)
{
    $base = 26; // Jumlah huruf dalam alfabet
    $number = 0;

    // Mengubah setiap huruf menjadi angka
    $length = strlen($letters);
    for ($i = 0; $i < $length; $i++) {
        $number *= $base;
        $number += ord($letters[$i]) - 64;
    }

    return $number;
}

// Contoh penggunaan
// $letters = "DW";
// $number = convertToNumber($letters);
// echo $number; // Output: 123
