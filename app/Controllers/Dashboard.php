<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetaModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $this->petaModel = new PetaModel;
        // 
        $data = [
            'j_data' => $this->petaModel->countAllResults(),
            'j_terpetakan' => $this->petaModel->countAllResults(),
            'j_belum_terpetakan' => $this->petaModel->countAllResults(),
        ];
        // dd($data);


        return view('Dashboard/index', $data);
    }
}
