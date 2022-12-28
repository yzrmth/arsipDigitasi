<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PetaSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 5000; $i++) {

            $data = [
                'proyek' => $faker->lexify('id-????'),
                'nomor_peta' => $faker->randomNumber(4, false),
                'tahun' => $faker->year(),
                'kecamatan' => $faker->state(),
                'desa' => $faker->citySuffix(),
                'kondisi_fisik' => $faker->boolean(),
                'file_foto' => $faker->fileExtension(),
                'file_dwg' => $faker->fileExtension(),
                'file_shp' => $faker->fileExtension(),
            ];


            // Simple Queries
            // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

            // Using Query Builder
            $this->db->table('tb_peta')->insert($data);
        }
    }
}
