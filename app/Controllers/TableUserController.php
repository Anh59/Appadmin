<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\{UserModel,GroupModel,RoleModel};
use CodeIgniter\HTTP\ResponseTrait;
class TableUserController extends BaseController
{
    // use ResponseTrait;
    public function tableuser()
    {
        //
        $useModel = new UserModel();
        $groupModel = new GroupModel();
        $roleModel = new RoleModel();
        $data['users']=$useModel->findAll();
        $data['groups']=$groupModel->findAll();
        return view('dashboard/User/Table',$data);
    }

    public function changeUserGroup()
    {
        $userModel = new UserModel();
        $userId = $this->request->getPost('user_id');
        $groupId = $this->request->getPost('group_id');

        $user = $userModel->find($userId);
        if ($user) {
            $user['group_id'] = $groupId;
            if ($userModel->save($user)) {
                // Cập nhật session nếu người dùng hiện tại được thay đổi nhóm
                $session = session();
                if ($session->get('user_id') == $userId) {
                    $session->set('group_id', $groupId);
                }
                return $this->response->setJSON(['status' => 'success']);
            }
        }
        return $this->response->setJSON(['status' => 'error']);
    }

    public function Account(){



    }
}
