<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{UserModel, RoleModel,GroupModel};
class RoleController extends BaseController
{
    public function table()
    {
        $userModel = new UserModel();
        $roleModel = new RoleModel();

        // Lấy danh sách người dùng và vai trò từ cơ sở dữ liệu
        $data['users'] = $userModel->findAll();
        $data['roles'] = $roleModel->findAll();

        return view('Dashboard/Role/Table', $data);
    }

    public function assignRoles()
    {
        $userModel = new UserModel();
        $roles = $this->request->getPost('roles');

        // Kiểm tra nếu mảng 'roles' tồn tại
        if ($roles && is_array($roles)) {
            foreach ($roles as $userId => $userRoles) {
                // Xóa các vai trò hiện tại
                $userModel->removeRoles($userId);

                // Gán vai trò mới
                if (is_array($userRoles)) {
                    foreach ($userRoles as $roleId) {
                        $userModel->assignRole($userId, $roleId);
                    }
                }
            }
        }

        return redirect()->route('Table_User')->with('message', 'Vai trò đã được cập nhật thành công');
    }


    public function _construct(){
       //$this->group = new GroupModel();

    }
    public function index(){
        //return view('Dashboard/Role/test',['groups'=>group->fillAll()]);
    }
}
