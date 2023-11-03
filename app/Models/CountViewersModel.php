<?php

namespace App\Models;

use CodeIgniter\Model;

class CountViewersModel extends Model
{
    protected $table = 'siades_countviewers';
    protected $useTimestamps = true;
    protected $allowedFields = ['idpage', 'useradress', 'tanggal', 'bulan', 'tahun'];

    public function addViewers($idpage)
    {
        $array = [
            'idpage' => $idpage,
            'useradress' => takeusers(),
            'tanggal' => date('d'),
            'bulan' => date('m'),
            'tahun' => date('Y'),
        ];

        $unique = $this->where($array)->countAllResults();

        if ($unique === 0) {
            $this->save([
                'idpage' => $idpage,
                'useradress' => takeusers(),
                'tanggal' => date('d'),
                'bulan' => date('m'),
                'tahun' => date('Y'),
            ]);
        }
    }

    public function getDataByPage($idpage): int
    {
        return $this->where('idpage', $idpage)->countAllResults();
    }

    public function getDataForDays($days = 7): array
    {
        $result = [];

        for ($i = 0; $i < $days; $i++) {
            $day = date('d', strtotime("-$i days")); // Menghitung tanggal mundur sebanyak $i hari dari hari ini

            $array = [
                'tanggal' => $day,
                'bulan' => date('m'),
                'tahun' => date('Y'),
            ];


            $count = $this->where($array)->countAllResults();
            $result[$day] = $count;
        }

        return $result;
    }

    public function getDataForMonths($currentMonth = null, $historyMonths = 12): array
    {
        if ($currentMonth == null) {
            $currentMonth = date('Y-m');
        }

        $result = [];

        for ($i = 0; $i < $historyMonths; $i++) {
            $targetMonth = date('Y-m', strtotime("-$i months", strtotime($currentMonth)));
            $year = date('Y', strtotime($targetMonth));
            $month = date('m', strtotime($targetMonth));

            $this->where('bulan', $month);
            $this->where('tahun', $year);
            $count = $this->countAllResults();

            $result[$targetMonth] = $count;
        }

        return $result;
    }

    public function getDataForYears($currentYear = null, $historyYears = 5): array
    {
        if ($currentYear == null) {
            $currentYear = date('Y');
        }

        $result = [];

        for ($i = 0; $i < $historyYears; $i++) {
            $targetYear = $currentYear - $i;

            $this->where('tahun', $targetYear);
            $count = $this->countAllResults();

            $result[$targetYear] = $count;
        }

        return $result;
    }
}
