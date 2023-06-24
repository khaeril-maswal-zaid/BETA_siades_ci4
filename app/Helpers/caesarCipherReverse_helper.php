<?php

function caesarCipherReverse($string = 'Kaheril Maswal Zaid', $shift = 7)
{
    $result = "";
    $length = strlen($string);

    // Loop melalui setiap karakter dalam string
    for ($i = 0; $i < $length; $i++) {
        $char = $string[$i];

        // Periksa apakah karakter merupakan huruf
        if (ctype_alpha($char)) {
            // Tentukan apakah karakter adalah huruf besar atau huruf kecil
            $asciiOffset = ord(ctype_upper($char) ? 'A' : 'a');

            // Hitung posisi karakter setelah di-shift
            $position = ord($char) - $asciiOffset;

            // Lakukan shift berlawanan pada posisi karakter
            $position = ($position - $shift) % 26;

            // Jika posisi negatif, kembalikan ke posisi positif
            if ($position < 0) {
                $position += 26;
            }

            // Konversi kembali ke karakter ASCII
            $char = chr($position + $asciiOffset);
        }

        // Tambahkan karakter ke hasil
        $result .= $char;
    }

    return $result;
}
