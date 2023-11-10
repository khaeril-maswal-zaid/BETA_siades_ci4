<?php

namespace App\Models;

class ApiKemendesModel
{

    public function idmApi($idDesa, $tahun): array
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://idm.kemendesa.go.id/open/api/desa/rumusan/' . $idDesa . '/' . $tahun);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);

        return $result;
    }

    public function sdgsApi($idDesa)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://sid.kemendesa.go.id/sdgs/searching/score-sdgs?location_code=' . $idDesa);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);

        return $result;
    }

    public function jadwalSholatApi($idKab)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.myquran.com/v1/sholat/jadwal/' . $idKab . '/' . date('Y') . '/' . date('m'));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);

        return $result;
    }
}
