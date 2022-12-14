<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetaModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new PetaModel;
        // 
        $data = [
            'j_data' => $model->count_data(),
            'j_terpetakan' => $model->count_terpetakan(),
            'j_belum_terpetakan' => $model->count_belum_terpetakan(),
        ];


        return view('Dashboard/index', $data);
    }

    public function test_select()
    {
        $model = new PetaModel;
        $data = $model->select();
        print_r($data->getResult());
    }

    public function test_get_where()
    {
        $model = new PetaModel;
        $data['j_terpetakan'] = $model->get_where();
        // foreach ($data->getResult() as $key => $row) {
        //     echo ($key + 1) . '. ';
        //     echo ' - ';
        //     echo $row->status;
        //     echo '<br>';
        // }
        // foreach ($data as $key => $row) {
        //     print_r($key);
        // }
        // dd($data);

        return view('Dashboard/index', $data);
    }

    public function test_get_compiled_select()
    {
        $model = new PetaModel;
        $query = $model->get_compiled_select();
        print_r($query);
    }

    public function test_sum()
    {
        $model = new PetaModel;
        $data = $model->select_sum();
        print_r($data->getResult());
    }



    public function count_scan()
    {
        # code...
    }
}
