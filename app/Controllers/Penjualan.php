<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PenjualanModel;
use App\Models\PenjualanModelDetail;
use App\Models\UserModel;

class Penjualan extends BaseController
{
    public function index()
    {
        $pjModel = new PenjualanModel();
        $data = [
            'title' => 'Penjualan | Mini Project Web',
            'pjs' => $pjModel->orderBy('id', 'DESC')->findAll()
        ];
        return view('pages/penjualan/penjualan_view', $data);
    }

    public function indexDet($id = null)
    {
        // $pjModel = new UserModel();
        // $data = [
        //     'title' => 'Edit Users | Mini Project Web',
        //     'user_obj' => $pjModel->where('id', $id)->first()
        // ];

        // return view('pages/penjualan/edit_view', $data);

        $pjdModel = new PenjualanModelDetail();
        $data = [
            'title' => 'Penjualan Detail | Mini Project Web',
            'pjd' => $pjdModel->where('id_nota', $id)->orderBy('id', 'ASC')->findAll()
        ];

        // return print_r($data);

        return view('pages/penjualan/penjualan_view_det', $data);
    }

    public function create()
    {
        $brgModel = new BarangModel();
        $data = [
            'title' => 'Add Penjualan | Mini Project Web',
            'brg' => $brgModel->orderBy('id', 'ASC')->findAll()
        ];

        return view('pages/penjualan/add_penjualan', $data);
    }

    public function store()
    {
        $db = db_connect();
        $query = $db->query('SELECT SUBSTRING(id_nota, 6, 1) + 1 AS newcode FROM penjualan ORDER BY SUBSTRING(id_nota, 6, 1) DESC LIMIT 1;');
        $row = $query->getRow();

        $newCode = "";

        if (isset($row)) {
            $newCode = "NOTA_" . $row->newcode;
        } else {
            $newCode = "NOTA_1";
        }

        // $pjModel = new PenjualanModel();
        // $data = [
        //     'id_nota' => $newCode,
        //     'tgl'  => date('Y-m-d'),
        //     'kode_pelanggan'  => $this->request->getVar('jk'),
        //     'subtotal'  => $this->request->getVar('dom')
        // ];
        // $pjModel->insert($data);
        // return $this->response->redirect(site_url('/users-list'));
    }

    public function singleUser($id = null)
    {
        // $pjModel = new UserModel();
        // $data = [
        //     'title' => 'Edit Users | Mini Project Web',
        //     'user_obj' => $pjModel->where('id', $id)->first()
        // ];

        // return view('pages/penjualan/edit_view', $data);
    }

    public function update()
    {
        // $pjModel = new UserModel();
        // $id = $this->request->getVar('id');
        // $data = [
        //     'name' => $this->request->getVar('name'),
        //     'email'  => $this->request->getVar('email'),
        //     'jenis_kelamin'  => $this->request->getVar('jk'),
        //     'domisili'  => $this->request->getVar('dom'),
        //     'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        // ];

        // $pjModel->update($id, $data);
        // return $this->response->redirect(site_url('/users-list'));
    }

    public function delete($id = null)
    {
        $pjModel = new PenjualanModel();
        $data['penjualan'] = $pjModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('pj-list'));
    }
}
