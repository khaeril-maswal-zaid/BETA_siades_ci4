<?php

namespace App\Models;

use CodeIgniter\Model;

class CountViewersModel extends Model
{
    protected $table = 'siades_countviewers';
    protected $useTimestamps = true;
    protected $allowedFields = ['idpage', 'useradress', 'tanggal', 'bulan', 'tahun'];

    protected $setAwalViewers = 0; // Tidak sesuai ekspestasi jadi atur di add saja

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

        $cekFirst = $this->where('idpage', $idpage)->countAllResults();

        if ($cekFirst === 0) {
            for ($i = 1; $i < 51; $i++) {
                $this->save([
                    'idpage' => $idpage,
                    'useradress' => takeusers() . '-' . $i,
                    'tanggal' => date('d'),
                    'bulan' => date('m'),
                    'tahun' => date('Y'),
                ]);
            }
        } elseif ($unique === 0) {
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
        $return = $this->setAwalViewers + $this->where('idpage', $idpage)->countAllResults();

        return $return;
    }

    public function getDataByPagies(array $idpagies): array
    {
        $returns = [];
        foreach ($idpagies as $ids) {
            $returns[] = $this->setAwalViewers + $this->where('idpage', $ids)->countAllResults();
        }

        return $returns;
    }

    public function getDataForDays($days = 7): array
    {
        $result = [];
        $dayss = [];

        for ($i = $days - 1; $i >= 0; $i--) {
            $day = date('d', strtotime("-$i days")); // Menghitung tanggal mundur sebanyak $i hari dari hari ini

            $array = [
                'tanggal' => $day,
                'bulan' => date('m'),
                'tahun' => date('Y'),
            ];

            $dayss[] = $day . date('-m-Y');

            $count = $this->where($array)->countAllResults();

            if ($count != 0) {
                $count = $this->setAwalViewers + $count;
            }
            $result[$day] = $count;
        }

        return [$result, $dayss];
    }


    public function getDataForMonths($currentMonth = null, $historyMonths = 12): array
    {
        if ($currentMonth == null) {
            $currentMonth = date('Y-m');
        }

        $result = [];
        $label = [];

        for ($i = $historyMonths - 1; $i >= 0; $i--) {
            $targetMonth = date('Y-m', strtotime("-$i months", strtotime($currentMonth)));
            $labelMonth = date('F, Y', strtotime("-$i months", strtotime($currentMonth)));

            $year = date('Y', strtotime($targetMonth));
            $month = date('m', strtotime($targetMonth));

            $this->where('bulan', $month);
            $this->where('tahun', $year);
            $count = $this->countAllResults();

            if ($count != 0) {
                $count = $this->setAwalViewers + $count;
            }
            $label[] =  $labelMonth;
            $result[$targetMonth] = $count;
        }

        return [$result, $label];
    }

    public function getDataForYears($currentYear = null, $historyYears = 4): array
    {
        if ($currentYear == null) {
            $currentYear = date('Y');
        }

        $result = [];
        $label = [];

        for ($i = $historyYears; $i >= 0; $i--) {
            $targetYear = $currentYear - $i;

            $this->where('tahun', $targetYear);
            $count = $this->countAllResults();

            if ($count != 0) {
                $count = $this->setAwalViewers + $count;
            }
            $label[] = $targetYear;
            $result[$targetYear] = $count;
        }

        return [$result, $label];
    }
}
