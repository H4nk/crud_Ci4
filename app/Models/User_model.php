<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password'];

    // Metode untuk menyimpan pengguna baru
    public function saveUser($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    // Metode untuk mencari pengguna berdasarkan email
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
