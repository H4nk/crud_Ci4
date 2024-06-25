<?php
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Test_view extends BaseController
{
    public function index()
    {
        $data['title']  = 'Selamat Data di Universitas Ekasakti';
        $data['msg1']    = 'Selamat datang Di Mata Kuliah Pemograman PHP';
        $data['msg2']    = 'Dengan Dosen : Harry Setya hadi';
        echo view('test_view', $data);
    }
}