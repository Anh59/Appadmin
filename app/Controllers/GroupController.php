<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GroupModel;

class GroupController extends BaseController
{
    public function table()
    {
        $model = new GroupModel();
        $data['groups'] = $model->findAll();
        $data['success'] = session()->getFlashdata('success');
        $data['error'] = session()->getFlashdata('error');
        return view('Dashboard/group/table', $data);
    }

    public function edit($id)
    {
        $model = new GroupModel();
        $data['group'] = $model->find($id);
        $data['success'] = session()->getFlashdata('success');
        $data['error'] = session()->getFlashdata('error');
        return view('Dashboard/group/edit', $data);
    }

    public function update($id)
    {
        $model = new GroupModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];

        if ($model->update($id, $data)) {
            session()->setFlashdata('success', 'Cập nhật nhóm thành công.');
        } else {
            session()->setFlashdata('error', 'Cập nhật nhóm thất bại.');
        }

        return redirect()->route('Table_Group');
    }

    public function create()
    {
        $data['success'] = session()->getFlashdata('success');
        $data['error'] = session()->getFlashdata('error');
        return view('Dashboard/group/create', $data);
    }

    public function store()
    {
        $model = new GroupModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];

        if ($model->save($data)) {
            session()->setFlashdata('success', 'Tạo nhóm mới thành công.');
        } else {
            session()->setFlashdata('error', 'Tạo nhóm mới thất bại.');
        }

        return redirect()->route('Table_Group');
    }

    public function delete($id)
    {
        $model = new GroupModel();
        
        if ($model->delete($id)) {
            session()->setFlashdata('success', 'Xóa nhóm thành công.');
        } else {
            session()->setFlashdata('error', 'Xóa nhóm thất bại.');
        }

        return redirect()->back();
    }
}
