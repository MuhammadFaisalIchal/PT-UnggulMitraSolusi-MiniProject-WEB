<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Controller;

class Barang extends BaseController
{
    public function index()
    {
        $brgModel = new BarangModel();
        $data = [
            'title' => 'Barang | Mini Project Web',
            'brg' => $brgModel->orderBy('id', 'ASC')->findAll()
        ];

        return view('pages/barang/barang_view', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Barang | Mini Project Web'
        ];

        return view('pages/barang/add_barang', $data);
    }

    public function store()
    {
        $db = db_connect();
        $query = $db->query('SELECT SUBSTRING(kode, 5, 1) + 1 AS newcode FROM barang ORDER BY SUBSTRING(kode, 5, 1) DESC LIMIT 1;');
        $row = $query->getRow();

        $newCode = "";

        if (isset($row)) {
            $newCode = "BRG_" . $row->newcode;
        } else {
            $newCode = "BRG_1";
        }

        $brgModel = new BarangModel();
        $data = [
            'kode' => $newCode,
            'nama_barang'  => $this->request->getVar('nama_brg'),
            'kategori'  => $this->request->getVar('kategori'),
            'harga'  => $this->request->getVar('harga'),
        ];

        $brgModel->insert($data);
        return $this->response->redirect(site_url('/'));
    }

    public function singleBrg($id = null)
    {
        $brgModel = new BarangModel();
        $data = [
            'title' => 'Edit Barang | Mini Project Web',
            'brg_obj' => $brgModel->where('id', $id)->first()
        ];

        return view('pages/barang/edit_barang', $data);
    }

    public function update()
    {
        $brgModel = new BarangModel();
        $id = $this->request->getVar('id');
        $data = [
            'nama_barang'  => $this->request->getVar('nama_brg'),
            'kategori'  => $this->request->getVar('kategori'),
            'harga'  => $this->request->getVar('harga'),
        ];

        $brgModel->update($id, $data);
        return $this->response->redirect(site_url('/'));
    }

    public function delete($id = null)
    {
        $brgModel = new BarangModel();
        $data['user'] = $brgModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/'));
    }
}
