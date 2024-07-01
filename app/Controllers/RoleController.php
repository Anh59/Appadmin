<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{UserModel, RoleModel,GroupModel};
class RoleController extends BaseController
{
    public function table()
    {
 // Lấy danh sách người dùng và vai trò từ cơ sở dữ liệu
        $roleModel = new RoleModel();
        $data['roles'] = $roleModel->findAll();
        return view('Dashboard/Role/Table', $data);
    }
    public function edit($id){
        $roleModel = new RoleModel();
        $data['roles'] = $roleModel->find($id);
        return view('Dashboard/Role/edit', $data);
    }
    public function update($id)
    {
        $roleModel = new RoleModel();
        $data=[
            'url'=>$this->request->getPost('url'),
            'description'=>$this->request->getPost('description'),
        ];
        if ($roleModel->update($id, $data)) {
            session()->setFlashdata('success', 'Cập nhật quyền thành công.');
        } else {
            session()->setFlashdata('error', 'Cập nhật quyền thất bại.');
        }

        return redirect()->route('Table_Role');
    }

    public function delete($id){
        $roleModel = new RoleModel();
        if ($roleModel->delete($id)) {
            session()->setFlashdata('success', 'Xóa quyền thành công.');
        } else {
            session()->setFlashdata('error', 'Xóa quyền thất bại.');
        }
        return redirect()->route('Table_Role');
    }
}
