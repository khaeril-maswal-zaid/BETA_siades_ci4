<?php

function dateIna_helper($date = null)
{

    if ($date == null) {
        $hari = date('l');
        $tanggal = date('d');
        $bulan = date('m');
        $tahun = date('Y');
    } else {
        $date = explode('-', $date);

        $hari = $date[0];
        $tanggal = $date[1];
        $bulan = $date[2];
        $tahun = $date[3];
    }

    // Buat sebuah array asosiatif untuk mengonversi angka bulan ke nama bulan
    $bulanIndonesia = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    $hariIndonesia = [
        "Sunday" => "Minggu",
        "Monday" => "Senin",
        "Tuesday" => "Selasa",
        "Wednesday" => "Rabu",
        "Thursday" => "Kamis",
        "Friday" => "Jumat",
        "Saturday" => "Sabtu"
    ];

    $hasil = $hariIndonesia[$hari] . ', ' . $tanggal . ' ' . $bulanIndonesia[(int)$bulan] . ' ' . $tahun;

    return $hasil;
}
