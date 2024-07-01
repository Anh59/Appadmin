<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\{RoleModel, UserModel,GroupModel,GroupRoleModel};

class GroupRoleController extends BaseController
{
    public function table()
    {
        $groupModel = new GroupModel();
        $roleModel = new RoleModel();
        $groupRoleModel = new GroupRoleModel();
        
        $groups = $groupModel->findAll();
        $roles = $roleModel->findAll();
        $groupRoles = $groupRoleModel->findAll();

        $data = [
            'groups' => $groups,
            'roles' => $roles,
            'groupRoles' => $groupRoles,
        ];

        return view('Dashboard/Group_Role/table', $data);
    }

    public function edit($id)
    {
        $groupModel = new GroupModel();
        $roleModel = new RoleModel();
        $groupRoleModel = new GroupRoleModel();

        $group = $groupModel->find($id);
        $roles = $roleModel->findAll();
        $groupRoles = $groupRoleModel->where('group_id', $id)->findAll();

        $data = [
            'group' => $group,
            'roles' => $roles,
            'groupRoles' => $groupRoles,
        ];

        return view('Dashboard/Group_Role/edit', $data);
    }

    public function update($id)
    {
        $groupRoleModel = new GroupRoleModel();
        $roleIds = $this->request->getPost('roles');

        // Xóa các quyền hiện tại
        $groupRoleModel->where('group_id', $id)->delete();

        // Thêm các quyền mới
        foreach ($roleIds as $roleId) {
            $groupRoleModel->insert(['group_id' => $id, 'role_id' => $roleId]);
        }
        
        session()->setFlashdata('success', 'Group roles updated successfully.');
        return redirect()->route('Table_GroupRole');
    }
    public function delete($id)
    {
        $groupRoleModel = new GroupRoleModel();
        $roleIds = $this->request->getPost('roles');
    
        // Kiểm tra xem các quyền có được chọn hay không
        if ($roleIds && is_array($roleIds)) {
            $success = true;
            foreach ($roleIds as $roleId) {
                // Xóa quyền dựa trên group_id và role_id
                if (!$groupRoleModel->where('group_id', $id)->where('role_id', $roleId)->delete()) {
                    $success = false;
                    break;
                }
            }
    
            if ($success) {
                session()->setFlashdata('success', 'Đã xóa thành công các quyền nhóm đã chọn.');
            } else {
                session()->setFlashdata('error', 'Không thể xóa các quyền nhóm đã chọn.');
            }
        } else {
            session()->setFlashdata('error', 'Không có quyền nào được chọn để xóa.');
        }
    
        return redirect()->route('Table_GroupRole');
    }
    

    public function Update_Session(){
        
    }
}
