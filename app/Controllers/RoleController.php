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
   // Controller/RoleController.php

        public function create()
        {
            return view('Dashboard/Role/create');
        }

        public function store()
        {
            $roleModel = new RoleModel();
            $url = $this->request->getPost('url');
            $description = $this->request->getPost('description');
        
            // Kiểm tra xem quyền đã tồn tại chưa
            $existing = $roleModel->where('url', $url)
                          ->orWhere('description', $description)
                          ->first();

                if ($existing) {
                    if ($existing['url'] === $url) {
                        session()->setFlashdata('error', 'Quyền này đã tồn tại.');
                    } elseif ($existing['description'] === $description) {
                        session()->setFlashdata('error', 'Không được có mô tả giống nhau.');
                    }
                    return redirect()->back()->withInput();
                }
        
            $data = [
                'url' => $url,
                'description' => $description,
            ];
        
            if ($roleModel->insert($data)) {
                session()->setFlashdata('success', 'Thêm mới quyền thành công.');
            } else {
                session()->setFlashdata('error', 'Thêm mới quyền thất bại.');
            }
        
            return redirect()->route('Table_Role');
        }


}
