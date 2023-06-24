<?php

namespace App\Models;

use CodeIgniter\Model;

class UpdateDbclickAjaxModel extends Model
{
    protected $table = '';
    protected $useTimestamps = true;
    protected $allowedFields = '';

    public function updateData($tableAjax, $idAjax, $targetAjax, $valAjax)
    {
        $this->table = $tableAjax;
        $this->allowedFields = [$targetAjax];

        $this->update($idAjax, [$targetAjax => $valAjax]);
    }
}
