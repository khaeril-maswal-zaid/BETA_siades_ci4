<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table = 'siades_keuangan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nik', 'name', 'email', 'hp', 'subject', 'aduan', 'file', 'status'];
}
