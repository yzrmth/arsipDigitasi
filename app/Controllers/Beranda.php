<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Beranda extends BaseController
{
    public function index()
    {
        return view('Beranda/index');
    }
}
