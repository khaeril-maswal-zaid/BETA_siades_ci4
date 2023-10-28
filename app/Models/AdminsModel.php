<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminsModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = false;

    public function getOne($colum, $where, $key)
    {
        return $this->select($colum)->where($where, $key)->first()[$colum];
    }
}
