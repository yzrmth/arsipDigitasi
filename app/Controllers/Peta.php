<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetaModel;

class Peta extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('tb_peta');
        $query = $builder->get()->getResult();

        $data['peta'] = $query;
        return view('peta/index', $data);
    }
    public function add()
    {
        $model = new PetaModel;
        $builder = $this->db->table('tb_peta');
        $image = $this->request->getFile('file_foto');
        $fileName = $image->getClientName();
        $image->move('uploads/FOTO/');

        $data = array(
            'proyek' => $this->request->getPost('proyek'),
            'nomor_peta' => $this->request->getPost('nomor_peta'),
            'tahun' => $this->request->getPost('tahun'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'desa' => $this->request->getPost('desa'),
            'kondisi_fisik' => $this->request->getPost('kondisi_fisik'),
            'file_foto' => $fileName
        );

        $builder->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('Peta'))->with('success', 'Data Berhasil Ditambah.');
        }
    }

    public function add_dwg($id)
    {
        $builder = $this->db->table('tb_peta');
        $image = $this->request->getFile('file_dwg');
        $fileName = $image->getClientName();
        $image->move('uploads/DWG/');

        $data = array(
            'status' => $this->request->getPost('status'),
            'file_dwg' => $fileName
        );

        $this->db->table('tb_peta')->where(['id_peta' => $id])->update($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('Peta'))->with('success', 'Data Berhasil Ditambah.');
        }
    }

    public function detil($id = null)
    {

        if ($id != null) {
            $query = $this->db->table('tb_peta')->getWhere(['id_peta' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['peta'] = $query->getRow();
                return view('peta/detil', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id)
    {
        $image = $this->request->getFile('file_foto');
        $fileName = $image->getClientName();
        $image->move('uploads/FOTO/');

        $data = [
            'proyek' => $this->request->getVar('proyek'),
            'nomor_peta' => $this->request->getVar('nomor_peta'),
            'tahun' => $this->request->getVar('tahun'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'desa' => $this->request->getVar('desa'),
            'kondisi_fisik' => $this->request->getVar('kondisi_fisik'),
            'file_foto' => $fileName
        ];

        $this->db->table('tb_peta')->where(['id_peta' => $id])->update($data);

        return redirect()->to(base_url('Peta/detil/' . $id))->with('success', 'Data Berhasil Diupdate.');
    }

    public function hapus($id)
    {
        $this->db->table('tb_peta')->where(['id_peta' => $id])->delete();

        return redirect()->to(base_url('Peta/'))->with('success', 'Data Berhasil Dihapus.');
    }

    public function download_foto($id = null)
    {
        $query = $this->db->table('tb_peta');
        $data = $query->getWhere(['id_peta' => $id])->getRow();

        return $this->response->download('uploads/FOTO/' . $data->file_foto, null);
    }

    public function download_dwg($id = null)
    {
        $query = $this->db->table('tb_peta');
        $data = $query->getWhere(['id_peta' => $id])->getRow();

        return $this->response->download('uploads/FOTO/' . $data->file_dwg, null);
    }

    public function download_shp($id = null)
    {
        $query = $this->db->table('tb_peta');
        $data = $query->getWhere(['id_peta' => $id])->getRow();

        return $this->response->download('uploads/FOTO/' . $data->file_shp, null);
    }
}
