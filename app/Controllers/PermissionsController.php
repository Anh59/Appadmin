<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
class PermissionsController extends BaseController
{
    public function table()
    {
        //
        return view('Dashboard/permissions/table');
    }


    public function tableuser_list(){
        $userModel = new UserModel();
        $data = $userModel->findAll();  // Correct way to fetch all users
        return $this->response->setJSON($data);
       
    }

    public function Account(){
        $role = $this->request->getVar('role');


    }
}
