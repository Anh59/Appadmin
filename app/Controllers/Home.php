<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function table(){
        return view('table');
    }
    public function Errors(){
        return view('errors');
    }
}
