<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserCrud extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data = [
            'title' => 'Users | Mini Project Web',
            'users' => $userModel->orderBy('id', 'DESC')->findAll()
        ];
        return view('pages/users/user_view', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add User | Mini Project Web'
        ];

        return view('pages/users/add_user', $data);
    }

    public function store()
    {
        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'jenis_kelamin'  => $this->request->getVar('jk'),
            'domisili'  => $this->request->getVar('dom'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }

    public function singleUser($id = null)
    {
        $userModel = new UserModel();
        $data = [
            'title' => 'Edit Users | Mini Project Web',
            'user_obj' => $userModel->where('id', $id)->first()
        ];

        return view('pages/users/edit_view', $data);
    }

    public function update()
    {
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'jenis_kelamin'  => $this->request->getVar('jk'),
            'domisili'  => $this->request->getVar('dom'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        ];

        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }

    public function delete($id = null)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }
}
