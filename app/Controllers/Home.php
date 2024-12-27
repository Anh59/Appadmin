<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
  
    public function index1(): string
    {
        return view('Home/index');
    }
    public function index2(): string
    {
        return view('Home/about');
    }
    public function index3(): string
    {
        return view('Home/blog');
    }
    public function index4(): string
    {
        return view('Home/contact');
    }
    public function index5(): string
    {
        return view('Home/elements');
    }
    public function index6(): string
    {
        return view('Home/layout-home');
    }
    public function index7(): string
    {
        return view('Home/test');
    }
    public function index8(): string
    {
        return view('Home/booking');
    }
    public function index9(): string
    {
        return view('Home/single_listing');
    }
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
    
    public function Errors(){
        return view('errors');
    }

    
    public function checkout(): string
    {
        return view('Home/config_order');
    }

    public function blogdetail():string{
        return view('Home/blogdetail');
    }
}
