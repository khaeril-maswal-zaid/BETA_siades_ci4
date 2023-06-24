<?php

function convertToLetter($id = 7)
{
    $base = 26; // Jumlah huruf dalam alfabet
    $letters = '';

    while ($id > 0) {
        $remainder = ($id - 1) % $base;
        $letters = chr(65 + $remainder) . $letters;
        $id = intdiv($id - $remainder, $base);
    }

    return $letters;
}

// Contoh penggunaan
// $id = 123;
// $letterId = convertToLetter($id);
// echo $letterId; // Output: 'DW' 


//untuk kembalikan ke ID -> convertToNumber()