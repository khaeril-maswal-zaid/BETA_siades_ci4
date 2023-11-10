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

        return $result['mapData'];
    }

    public function idmSdgs($idDesa)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://sid.kemendesa.go.id/sdgs/searching/score-sdgs?location_code=' . $idDesa);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);

        return $result;
    }
}
