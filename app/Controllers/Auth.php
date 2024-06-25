<?php

namespace App\Controllers;

use App\Models\User_model;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function register()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[5]|max_length[255]',
                'password_confirm' => 'matches[password]'
            ];

            if ($this->validate($rules)) {
                $model = new User_model();

                $newUserData = [
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                ];

                $model->saveUser($newUserData);
                
                return redirect()->to('/login')->with('success', 'Account created successfully');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        echo view('register', $data);
    }

    public function login()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[5]|max_length[255]'
            ];

            if ($this->validate($rules)) {
                $model = new User_model();

                $user = $model->getUserByEmail($this->request->getVar('email'));

                if ($user && password_verify($this->request->getVar('password'), $user['password'])) {
                    // Login berhasil
                    // Simpan informasi pengguna ke session
                    $session = session();
                    $session->set([
                        'user_id' => $user['id'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'isLoggedIn' => true
                    ]);

                    return redirect()->to('/karyawan');
                } else {
                    $data['error'] = 'Login failed. Incorrect email or password.';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        echo view('login', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
