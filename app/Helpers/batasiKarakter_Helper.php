<?php

function batasiKarakter($string, $batasan)
{
    if (strlen($string) > $batasan) {
        $string = substr($string, 0, $batasan); // Mengambil $batasan karakter pertama
    }
    return $string;
}
