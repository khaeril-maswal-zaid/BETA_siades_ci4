<?php

namespace App\Libraries;

class SendByEmail
{

    protected $email;

    function __construct()
    {
        $this->email = \Config\Services::email();
    }

    public function responAduan($dataaduan = [])
    {
        // dd($dataaduan);
        $this->email->setTo($dataaduan[0]); //muhammadkhaerilzaid@gmail.com
        $this->email->setFrom($this->email->fromEmail, $this->email->fromName);
        $this->email->setSubject('Respon atas Aduan Anda');

        $this->email->setMessage('
            <p>Assalamualaikum Wr. Wb.</p>
            <p>Dear <strong>' . $dataaduan[1] . '</strong>,</p>
            <p>Aduan Nomor:  [' . $dataaduan[2] . ']</p>
            <p>Kami ingin menyampaikan bahwa aduan Anda telah mendapatkan respon dari stakeholder terkait. Berikut adalah respon atas aduan Anda:</p>
        
            <p style="font-style: italic;">"' . $dataaduan[3] . '"</p>

            <p>Jika Anda memiliki pertanyaan atau memerlukan informasi lebih lanjut, jangan ragu untuk menghubungi kami di ' . base_url('kontak-desa') . '.</p>
                    
            <p>Salam,</p>
            <p>Admin Sides ' . DESA . '</p>
            <p>Wassalamualaikum Wr. Wb.</p>
        ');

        if ($this->email->send()) {
            return true;
        } else {
            $data = $this->email->printDebugger(['headers']);
            print_r($data);
        }
    }

    public function notifAduan($dataaduan = [])
    {
        // dd($dataaduan);
        $this->email->setTo($dataaduan[0]); //muhammadkhaerilzaid@gmail.com
        $this->email->setFrom($this->email->fromEmail, $this->email->fromName);
        $this->email->setSubject('Pemberitahuan: Aduan Anda Telah Diterima');

        $this->email->setMessage('
            <p>Assalamualaikum Wr. Wb.</p>
            <p>Dear <strong>' . $dataaduan[1] . '</strong>,</p>
            <p>Kami mengucapkan terima kasih atas aduan Anda di situs Desa ' . DESA . '.</p>
            <p>Kami ingin mengkonfirmasi bahwa aduan Anda telah berhasil diterima dan sedang dalam proses penanganan. Berikut adalah rincian aduan Anda:</p>

            <ul>
                <li><strong>Nomor Aduan:</strong> ' . $dataaduan[2] . '</li>
                <li><strong>Tanggal Pengiriman:</strong> ' . dateIna_helper() . '</li>
                <li><strong>Subjek:</strong> ' . $dataaduan[3] . '</li>
            </ul>
        
            <p>Kami akan segera meninjau aduan Anda dan akan memberikan pembaruan lebih lanjut segera setelah ada perkembangan.</p>
            <p>Jika Anda memiliki pertanyaan atau memerlukan informasi lebih lanjut, jangan ragu untuk menghubungi kami di ' . base_url('kontak-desa') . '.</p>
                    
            <p>Salam,</p>
            <p>Admin Sides ' . DESA . '</p>
            <p>Wassalamualaikum Wr. Wb.</p>
        ');

        if ($this->email->send()) {
            return true;
        } else {
            $data = $this->email->printDebugger(['headers']);
            print_r($data);
        }
    }
}
