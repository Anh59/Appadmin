<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
 
    public function table()
    {
        $data = [
            'pageTitle' => 'Home',  // Tiêu đề của trang
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Admin.Home')],
            ]
        ];
    
        // Trả về view table với dữ liệu breadcrumb và pageTitle
        return view('table', $data);
    }
}
