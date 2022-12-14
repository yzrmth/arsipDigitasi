<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPeta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peta' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nomor_peta' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'proyek' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kecamatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'desa' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kondisi_fisik' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'file_foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'file_dwg' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'file_shp' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'blog_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_peta', true);
        $this->forge->createTable('tb_peta');
    }

    public function down()
    {
        $this->forge->dropTable('tb_peta');
    }
}
