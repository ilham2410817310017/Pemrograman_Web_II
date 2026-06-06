<?php

namespace App\Controllers;
use App\Models\PraktikanModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new PraktikanModel();       
        $data = $model->getPraktikanData();
        return view('beranda', $data);
    }

    public function profil()
    {
        return view('profil');
    }
}