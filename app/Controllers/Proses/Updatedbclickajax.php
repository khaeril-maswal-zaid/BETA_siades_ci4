<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\UpdateDbclickAjaxModel;

class Updatedbclickajax extends BaseController
{
    protected $targetmodel;

    public function __construct()
    {
        $this->targetmodel = new UpdateDbclickAjaxModel();
    }

    public function index($tableredirect)
    {
        $table = caesarCipherReverse($tableredirect, -7);

        $idUpdate = convertToNumber($_POST['idUpdate']);
        $targetColum = caesarCipherReverse($_POST['targetColum'], -7);
        $newvalue = $_POST['newvalue'];

        // var_dump($table,  $idUpdate, $targetColum, $newvalue);
        // die;

        $this->targetmodel->updateData($table,  $idUpdate, $targetColum, $newvalue);
    }
}
