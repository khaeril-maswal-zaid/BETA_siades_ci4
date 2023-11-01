<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminsModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['image', 'fullname'];

    public function getOne($colum, $where, $key)
    {
        $return = $this->select($colum)->where($where, $key)->first();
        if (isset($return)) {
            return $return[$colum];
        } else {
            return 'default.jpg';
        }
    }
}
