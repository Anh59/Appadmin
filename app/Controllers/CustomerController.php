<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\I18n\Time;

class CustomerController extends BaseController
{
    public function register()
    {
        return view('customer/register'); // Gọi view đăng ký
    }

    public function registerPost()
    {
        helper('text');

        // Lấy dữ liệu từ form đăng ký
        $data = $this->request->getPost();

        // Tạo OTP
        $otp = random_string('numeric', 6); // Mã OTP gồm 6 số
        $otpExpiration = Time::now()->addMinutes(5); // OTP hết hạn sau 5 phút

        // Lưu thông tin người dùng vào cơ sở dữ liệu
        $customerModel = new CustomerModel();
        $customerModel->insert([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'otp' => $otp,
            'otp_expiration' => $otpExpiration,
            'is_verified' => false,
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'created_at' => Time::now(),
        ]);

        // Gửi OTP qua email
        $emailService = \Config\Services::email();
        $emailService->setTo($data['email']);
        $emailService->setSubject('Xác nhận đăng ký');
        $emailService->setMessage("Mã OTP của bạn là: $otp");
        $emailService->send();

        return redirect()->to('Customer/verify-otp');
    }

    public function verifyOtp()
    {
        return view('Customer/verify_otp'); // Gọi view xác nhận OTP
    }

    public function verifyOtpPost()
    {
        $otp = $this->request->getPost('otp');
        $email = $this->request->getPost('email');

        $customerModel = new CustomerModel();
        $customer = $customerModel->where('email', $email)->first();

        if ($customer && $customer['otp'] === $otp && Time::now()->isBefore($customer['otp_expiration'])) {
            $customerModel->update($customer['id'], [
                'is_verified' => true,
                'otp' => null,
                'otp_expiration' => null,
            ]);
            return redirect()->to('/login')->with('success', 'Tài khoản đã được xác nhận');
        } else {
            return redirect()->back()->with('error', 'OTP không hợp lệ hoặc đã hết hạn');
        }
    }

    public function login()
    {
        return view('customer/login'); // Gọi view đăng nhập
    }

    public function loginPost()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $customerModel = new CustomerModel();
        $customer = $customerModel->where('email', $email)->first();

        if ($customer && $customer['is_verified'] && password_verify($password, $customer['password'])) {
            session()->set(['isLoggedIn' => true, 'user' => $customer]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Thông tin đăng nhập không chính xác hoặc tài khoản chưa được xác nhận');
        }
    }

    public function forgotPassword()
    {
        return view('customer/forgot_password'); // Gọi view quên mật khẩu
    }

    public function forgotPasswordPost()
    {
        helper('text');
        $email = $this->request->getPost('email');

        $customerModel = new CustomerModel();
        $customer = $customerModel->where('email', $email)->first();

        if ($customer) {
            $token = random_string('alnum', 32);
            $customerModel->update($customer['id'], ['reset_token' => $token]);

            // Gửi email với đường link đặt lại mật khẩu
            $emailService = \Config\Services::email();
            $emailService->setTo($email);
            $emailService->setSubject('Đặt lại mật khẩu');
            $emailService->setMessage("Nhấn vào đường link sau để đặt lại mật khẩu: " . base_url("/reset-password/$token"));
            $emailService->send();

            return redirect()->to('/login')->with('success', 'Hãy kiểm tra email để đặt lại mật khẩu');
        } else {
            return redirect()->back()->with('error', 'Email không tồn tại trong hệ thống');
        }
    }

    public function resetPassword($token)
    {
        return view('customer/reset_password', ['token' => $token]); // Gọi view đặt lại mật khẩu
    }

    public function resetPasswordPost($token)
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->where('reset_token', $token)->first();

        if ($customer) {
            $newPassword = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
            $customerModel->update($customer['id'], ['password' => $newPassword, 'reset_token' => null]);

            return redirect()->to('/login')->with('success', 'Mật khẩu đã được cập nhật');
        } else {
            return redirect()->back()->with('error', 'Token không hợp lệ');
        }
    }

    public function changePassword()
    {
        return view('customer/change_password'); // Gọi view thay đổi mật khẩu
    }

    public function changePasswordPost()
    {
        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');

        $customerModel = new CustomerModel();
        $customer = $customerModel->find(session()->get('user')['id']);

        if (password_verify($currentPassword, $customer['password'])) {
            $customerModel->update($customer['id'], ['password' => password_hash($newPassword, PASSWORD_BCRYPT)]);
            return redirect()->to('/profile')->with('success', 'Mật khẩu đã được cập nhật');
        } else {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không đúng');
        }
    }
}
