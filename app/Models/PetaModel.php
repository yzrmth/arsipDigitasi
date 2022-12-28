<?php

namespace App\Models;

use CodeIgniter\Model;

class PetaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_peta';
    protected $primaryKey       = 'id_peta';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nomor_peta', 'proyek', 'tahun', 'kecamatan', 'desa', 'kondisi_fisik', 'status', 'file_foto', 'file_dwg', 'file_shp'];


    public function getPeta($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->where(['id_peta' => $id])->first();
    }

    // Pencarian Berdasarakan field file_foto

    public function search($keyword)
    {
        $builder = $this->table('tb_peta');
        $builder->like('file_foto', $keyword);

        return $builder;
    }
}
