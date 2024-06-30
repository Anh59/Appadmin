<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PermissionsController extends BaseController
{
    public function table()
    {
        //
        return view('Dashboard/permissions/table');
    }


    public function create(){
    
    }
}
