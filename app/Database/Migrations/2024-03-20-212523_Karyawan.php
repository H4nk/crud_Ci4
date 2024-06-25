<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_karyawan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'usia'      => [
                'type'           => 'INT',
                'constraint'     => 2,
            ],
            'status_vaksin_1'      => [
                'type'           => 'ENUM',
                'constraint'     => ['sudah', 'belum'],
                'default'        => 'belum',
            ],
            'status_vaksin_2'      => [
                'type'           => 'ENUM',
                'constraint'     => ['sudah', 'belum'],
                'default'        => 'belum',
            ],
        ]);
 
        // Membuat primary key
        $this->forge->addKey('id', TRUE);
 
        // Membuat tabel data_karyawan
        $this->forge->createTable('data_karyawan', TRUE);
    }

    public function down()
    {
              // menghapus tabel data_karyawan
        $this->forge->dropTable('data_karyawan');
    }
}
