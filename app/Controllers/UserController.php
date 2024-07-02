<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function loginForm()
    {
        // Hiển thị form đăng nhập
        return view('login');
    }

    public function login()
    {
        // Xử lý đăng nhập
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Đăng nhập thành công, lưu thông tin vào session
            $session = session();
            $session->set('user',[
                'user_id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'group_id' => $user['group_id'],
                'logged_in' => true,
            ]);

            return redirect()->to('Dashboard/table'); // Chuyển hướng đến trang dashboard sau khi đăng nhập thành công
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function registerForm()
    {
        // Hiển thị form đăng ký
        return view('sign');
    }

    public function register()
    {
        // Xử lý đăng ký
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'user', // Ví dụ: mặc định là user, có thể điều chỉnh
            'group_id' => 3, // Ví dụ: mặc định là group_id 1, có thể điều chỉnh
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->userModel->insert($data);

        return redirect()->to('/login')->with('success', 'Account created successfully. You can now login.'); // Chuyển hướng đến trang đăng nhập sau khi đăng ký thành công
    }

    public function logout()
    {
        // Xử lý đăng xuất
        $session = session();
        $session->destroy();

        return redirect()->to('/login');
    }
}
