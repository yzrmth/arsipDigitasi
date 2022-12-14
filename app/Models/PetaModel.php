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
    protected $allowedFields    = [];

    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get()
    {
        //SELECT * FROM video_games_sales LIMIT 20 OFFSET 0
        $builder = $this->db->table('tb_peta');
        $query = $builder->get(20, 0);
        return $query;
    }

    public function count_data()
    {
        //SELECT * FROM video_games_sales LIMIT 20 OFFSET 0
        $builder = $this->db->table('tb_peta');
        $query = $builder->get();
        return $query;
    }
    public function count_terpetakan()
    {
        //SELECT * FROM `video_games_sales` WHERE `Publisher` = 'Nintendo'
        $builder = $this->db->table('tb_peta');
        $query = $builder->getWhere(['status' => 'Terpetakan']);
        return $query;
    }

    public function count_belum_terpetakan()
    {
        //SELECT * FROM `video_games_sales` WHERE `Publisher` = 'Nintendo'
        $builder = $this->db->table('tb_peta');
        $query = $builder->getWhere(['status' => 'Belum Terpetakan']);
        return $query;
    }
}
