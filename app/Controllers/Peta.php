<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetaModel;
use PhpParser\Node\Expr\Empty_;

class Peta extends BaseController
{
    public function __construct()
    {
        $this->petaModel = new PetaModel();
    }
    public function index()
    {
        // mengatasi nomor urutan di tabel
        $currentPage = $this->request->getVar('page_PetaTable')  ? $this->request->getVar('page_PetaTable') : 1;

        // Pencarian
        $keyword = $this->request->getVar('keyword');
        if (isset($keyword)) {
            $peta = $this->petaModel->search($keyword);
            session()->set('cari', $keyword);

            redirect()->to('/Peta/index');
        } else {
            $peta = $this->petaModel;
        }

        $data = [
            'title' => 'Rekapitulasi Peta',
            'peta' => $this->petaModel->paginate(10, 'PetaTable'),
            'pager' => $this->petaModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword
        ];


        return view('peta/index', $data);
    }

    public function detil($id)
    {

        $peta = $this->petaModel->getPeta($id);
        $data = [
            'title' => 'Detil Peta',
            'peta' => $peta
        ];

        return view('peta/detil', $data);
    }

    public function formTambah()
    {
        $data = [
            'title' => 'Aplikasi | Formulir Tambah Data',
            'content_header' => 'Formulir Tambah Data',
            'validation' => \Config\Services::validation()
        ];

        return view('peta/formTambah', $data);
    }

    public function simpan()
    {
        $validasi  = \Config\Services::validation();
        $aturan = [
            'proyek' => [
                'label' => 'proyek',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ]
        ];

        $validasi->setRules($aturan);

        if ($validasi->withRequest($this->request)->run()) {
            $data = [
                'proyek' => $this->request->getPost('proyek'),
                'nomor_peta' => $this->request->getPost('nomor_peta'),
                'tahun' => $this->request->getPost('tahun'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'desa' => $this->request->getPost('desa'),
                'kondisi_fisik' => $this->request->getPost('kondisi_fisik'),
            ];

            $this->petaModel->save($data);

            $hasil['sukses'] = 'Data Berhasil disimpan';
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }

        return json_encode($hasil);
    }

    public function add()
    {

        if (!$this->validate([
            'kondisi_fisik' => [
                'rules' => 'required',
                'error' => [
                    'require' => '{field} haris diisi.'
                ]
            ],
            'file_foto' => [
                'rules' => 'is_image[file_foto]|mime_in[file_foto,image/jpeg,image/jpg,image/png,image/JPG]',
                'error' => [
                    'is_image' => 'Yang dipiih bukan gambar.',
                    'mime_in' => 'Yang dipiih bukan gambar.'
                ]
            ]
        ])) {

            return redirect()->to('/Peta/formTambah')->withInput();
        }

        // AMBIL FILE GAMBAR
        $file = $this->request->getFile('file_foto');

        // cek apakah user ada menguplaod gambar
        if ($file->getError() == 4) {
            $fileName = 'no_image.png';
        } else {
            $fileName = $file->getName();
            $file->move('./uploads/FOTO/');
        }
        // dd($file);

        $this->petaModel->save([
            'proyek' => $this->request->getPost('proyek'),
            'nomor_peta' => $this->request->getPost('nomor_peta'),
            'tahun' => $this->request->getPost('tahun'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'desa' => $this->request->getPost('desa'),
            'kondisi_fisik' => $this->request->getPost('kondisi_fisik'),
            'file_foto' => $fileName
        ]);

        session()->setFlashdata('success', 'Data berhasil disimpan.');

        return redirect()->to('/Peta');
    }

    public function delete($id)
    {

        $this->petaModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus.');

        return redirect()->to('/Peta');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Aplikasi | Formulir Edit Data',
            'content_header' => 'Formulir Edit Data',
            'validation' => \Config\Services::validation(),
            'peta' => $this->petaModel->getPeta($id)
        ];

        return view('peta/formEdit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'file_foto' => [
                'rules' => 'is_image[file_foto]|mime_in[file_foto,image/jpeg,image/jpg,image/png,image/JPG]',
                'error' => [
                    'is_image' => 'Yang dipiih bukan gambar.',
                    'mime_in' => 'Yang dipiih bukan gambar.'
                ]
            ]
        ])) {

            return redirect()->to('/Peta/formEdit' . $this->request->getPost('id_peta'))->withInput();
        }

        // kelola file
        $file = $this->request->getFile('file_foto');

        // cek apakah gambar beruba/baru atau tidak
        if ($file->getError() == 4) {
            $fileName = $this->request->getPost('file_foto_lama');
        } else {
            // generate nama file
            $fileName = $file->getName();

            // pindahkan file ke folder penyimpanan 
            $file->move('./uploads/FOTO/', $fileName);

            // hapus file lama
            // unlink('./uploads/FOTO/'. $this->request->getPost('file_foto_lama'));
        }


        $this->petaModel->save([
            'id_peta' => $this->request->getPost('id_peta'),
            'proyek' => $this->request->getPost('proyek'),
            'nomor_peta' => $this->request->getPost('nomor_peta'),
            'tahun' => $this->request->getPost('tahun'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'desa' => $this->request->getPost('desa'),
            'kondisi_fisik' => $this->request->getPost('kondisi_fisik'),
            'file_foto' => $fileName
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah.');

        return redirect()->to('/Peta/detil/' . $id);
    }

    public function do_download($id)
    {
        $file = $this->petaModel->find($id);

        $fileName = $file->file_foto;
        // dd($fileName);
        return $this->response->download('./uploads/FOTO/' . $fileName, null);
    }
}
