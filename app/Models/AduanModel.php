<?php

namespace App\Models;

use CodeIgniter\Model;

class AduanModel extends Model
{
    protected $table = 'siades_aduan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nomoraduan', 'nik', 'name', 'email', 'hp', 'subject', 'aduan', 'file', 'status', 'updated_by', 'respon'];
}
