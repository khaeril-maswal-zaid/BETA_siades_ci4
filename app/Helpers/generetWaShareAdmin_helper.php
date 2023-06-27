<?php

function generetWaShareAdmin($nomor_telepon, $text)
{
    // hapus karakter selain angka dan tanda plus (+)
    $nomor_telepon = preg_replace('/[^0-9+]/', '', $nomor_telepon);
    // hapus spasi dari nomor telepon
    $nomor_telepon = preg_replace('/\s+/', '', $nomor_telepon);


    if (substr($nomor_telepon, 0, 1) == "0") {
        $nomor_telepon = "62" . substr($nomor_telepon, 1); // ubah format nomor telepon yang dimulai dengan "0"
    }

    $link_whatsapp = 'https://wa.me/' . $nomor_telepon . '?text=' . $text; // membuat link WhatsApp dengan pesan "hallo"

    return $link_whatsapp;
}
