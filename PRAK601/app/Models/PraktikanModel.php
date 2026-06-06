<?php

namespace App\Models;
use CodeIgniter\Model;

class PraktikanModel extends Model
{
    public function getPraktikanData()
    {
        return [
            'nama' => 'Muhammad Ilham',
            'nim'  => '2410817310017'
        ];
    }
}