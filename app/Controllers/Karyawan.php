<?php
 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Karyawan_model;

class Karyawan extends Controller
{
    
    public function index()
    {
       if (!session()->get('isLoggedIn')) {
             return redirect()->to('/login');
        }
        $model = new Karyawan_model;
        $data['title']     = 'Data Vaksin Karyawan';
        $data['getKaryawan'] = $model->getKaryawan();
         echo view('header', $data);
        echo view('karyawan_view', $data);
        echo view('footer', $data);
    }
 
    public function add()
    {
        $model = new Karyawan_model;
        $data = array(
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'usia'         => $this->request->getPost('usia'),
            'status_vaksin_1'  => $this->request->getPost('status_vaksin_1'),
            'status_vaksin_2'  => $this->request->getPost('status_vaksin_2')
        );
        $model->saveKaryawan($data);
        echo '<script>
                alert("Selamat! Berhasil Menambah Data Vaksinasi Karyawan");
                window.location="' . base_url('karyawan') . '"
            </script>';
    }
	public function edit($id)
    {
        $model = new Karyawan_model;
        $getKaryawan = $model->getKaryawan($id)->getRow();
        if (isset($getKaryawan)) {
            $data['data_karyawan'] = $getKaryawan;
            $data['title']  = 'Karyawan Universitas Ekasakti';
 
            echo view('header', $data);
            echo view('edit_view', $data);
            echo view('footer', $data);
        } else {
 
            echo '<script>
                    alert("ID karyawan ' . $id . ' Tidak ditemukan");
                    window.location="' . base_url('karyawan') . '"
                </script>';
        }
    }
 
    public function update()
    {
        $model = new Karyawan_model;
        $id = $this->request->getPost('id');
        $data = array(
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'usia'         => $this->request->getPost('usia'),
            'status_vaksin_1'  => $this->request->getPost('status_vaksin_1'),
            'status_vaksin_2'  => $this->request->getPost('status_vaksin_2')
        );
        $model->editKaryawan($data, $id);
        echo '<script>
                alert("Selamat! Anda berhasil melakukan update data.");
                window.location="' . base_url('karyawan') . '"
            </script>';
    }
	public function hapus($id)
    {
        $model = new Karyawan_model;
        $getKaryawan = $model->getKaryawan($id)->getRow();
        if (isset($getKaryawan)) {
            $model->hapusKaryawan($id);
            echo '<script>
                    alert("Selamat! Data berhasil terhapus.");
                    window.location="' . base_url('karyawan') . '"
                </script>';
        } else {
 
            echo '<script>
                    alert("Gagal Menghapus !, ID karyawan ' . $id . ' Tidak ditemukan");
                    window.location="' . base_url('karyawan') . '"
                </script>';
        }
    }
 
}