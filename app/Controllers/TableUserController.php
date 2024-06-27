<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseTrait;
class TableUserController extends BaseController
{
    // use ResponseTrait;
    public function tableuser()
    {
        //
        return view('dashboard/User/Table');
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
