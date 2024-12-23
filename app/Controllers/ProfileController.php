<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CustomerModel;
class ProfileController extends BaseController
{
    //thừa để test
    public function __construct()
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to(base_url('api_Customers/customers_sign'))->with('error', 'Bạn cần đăng nhập để truy cập.');
    }
}
    //
    public function profile()
    {
        return view('customer/profile');
    }

    public function personal()
    {
        $customerId = session()->get('customer_id'); // Lấy ID khách hàng từ session
        $customerModel = new CustomerModel();

        $customer = $customerModel->find($customerId); // Tìm thông tin khách hàng

        if (!$customer) {
            // Nếu không tìm thấy khách hàng, hiển thị trang lỗi
            return redirect()->to('/error_page')->with('error', 'Không tìm thấy thông tin người dùng.');
        }

        // Truyền thông tin khách hàng vào view
        return view('customer/personal', ['user' => $customer]);
    }

    public function change_password()
    {
        return view('customer/change_password');
    }
    public function changePassword()
    {
        $customerModel = new CustomerModel();
    
        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');
    
        // Kiểm tra mật khẩu mới có hợp lệ không
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $newPassword)) {
            return redirect()->back()->with('error', 'Mật khẩu mới không hợp lệ! Phải ít nhất 8 ký tự, bao gồm chữ cái, số và ký tự đặc biệt.');
        }
    
        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'Mật khẩu mới và mật khẩu xác nhận không khớp!');
        }
    
        $customer = $customerModel->find(session()->get('customer_id'));
        if ($customer && password_verify($currentPassword, $customer['password'])) {
            // Cập nhật mật khẩu mới
            $customerModel->update($customer['id'], [
                'password' => password_hash($newPassword, PASSWORD_DEFAULT)
            ]);
    
            return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công.');
        }
    
        return redirect()->back()->with('error', 'Mật khẩu cũ không chính xác.');
    }
    public function changePersonalInfo()
    {
        $customerModel = new CustomerModel();
        $customerId = session()->get('customer_id');
        $customer = $customerModel->find($customerId);

        return view('customer/changePersonalInfo', ['customer' => $customer]);
    }

    // Xử lý thay đổi thông tin cá nhân
    public function updatePersonalInfo()
    {
        $customerModel = new CustomerModel();
        $customerId = session()->get('customer_id');
    
        $data = [
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ];
    
        // Nếu thay đổi email, kiểm tra email mới
        $newEmail = $this->request->getPost('email');
        $oldEmail = $this->request->getPost('old_email');
    
        if ($newEmail != $oldEmail) {
            // Kiểm tra email mới đã được đăng ký chưa
            $existingCustomer = $customerModel->where('email', $newEmail)->first();
            if ($existingCustomer) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Email này đã được đăng ký. Vui lòng chọn email khác.',
                ]);
            }
    
            // Nếu email hợp lệ, tạo OTP
            $otp = rand(100000, 999999);
            $otp_expiration = date('Y-m-d H:i:s', strtotime('+5 minutes')); // 5 phút hết hạn
    
            // Lưu OTP vào cơ sở dữ liệu
            $customerModel->update($customerId, [
                'otp' => $otp,
                'otp_expiration' => $otp_expiration,
            ]);
    
            // Lưu email mới vào session
            session()->set('pending_email', $newEmail);
    
            // Gửi OTP qua email
            $this->_sendOTP($newEmail, $otp);
    
            return redirect()->route('verifyChangeEmailOTP');
        }
    
        // Cập nhật thông tin nếu không thay đổi email
        $customerModel->update($customerId, $data);
    
        session()->setFlashdata('success', 'Thông tin cá nhân đã được cập nhật.');
        return redirect()->route('changePersonalInfo');
    }
    
    

    

// Trang nhập OTP
public function verifyChangeEmailOTP()
{
    return view('customer/verifyChangeEmailOTP');
}

// Xử lý xác nhận OTP
public function handleVerifyChangeEmailOTP()
{
    $customerModel = new CustomerModel();
    $customerId = session()->get('customer_id');
    $otpInput = $this->request->getPost('otp');
    $customer = $customerModel->find($customerId);

    // Kiểm tra OTP
    if ($customer['otp'] == $otpInput && strtotime($customer['otp_expiration']) > time()) {
        // Lấy email mới từ session
        $newEmail = session()->get('pending_email');

        // Xác nhận email mới
        $customerModel->update($customerId, [
            'email' => $newEmail,
            'otp' => null,
            'otp_expiration' => null,
        ]);

        // Xóa email tạm thời khỏi session
        session()->remove('pending_email');

        session()->setFlashdata('success', 'Email đã được xác nhận và cập nhật.');
        return redirect()->route('changePersonalInfo');
    } else {
        session()->setFlashdata('error', 'OTP không hợp lệ hoặc đã hết hạn.');
        return redirect()->route('verifyChangeEmailOTP');
    }
}



    // Phương thức gửi OTP qua email
    private function _sendOTP($email, $otp)
    {
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('Mã OTP của bạn');
        $emailService->setMessage('Mã OTP của bạn là: ' . $otp);
        if (!$emailService->send()) {
            log_message('error', 'Gửi email thất bại: ' . $emailService->printDebugger(['headers']));
        }
    }


    
    public function order()
    {
        return view('customer/order');
    }
    public function history_order()
    {
        return view('customer/history_order');
    }
    public function orderqq()
    {
        return view('customer/order');
    }
    // public function personal()
    // {
    //     if ($this->request->getMethod() === 'get') {
    //         $customerId = session()->get('customer_id'); // Lấy ID khách hàng từ session
    //         $customerModel = new \App\Models\CustomerModel();
    //         $customer = $customerModel->find($customerId); // Tìm thông tin khách hàng
    
    //         // Nếu không tìm thấy khách hàng, chuyển hướng hoặc thông báo lỗi
    //         if (!$customer) {
    //             return redirect()->to('/error_page')->with('error', 'Không tìm thấy thông tin người dùng.');
    //         }
    
    //         // Truyền thông tin khách hàng vào view
    //         return view('Customer/personal', ['user' => $customer]);
    //     }
    
    //     // Xử lý AJAX
    //     if ($this->request->isAJAX()) {
    //         $customerId = session()->get('customer_id');
    //         $customerModel = new \App\Models\CustomerModel();
    //         $customer = $customerModel->find($customerId);
    
    //         if ($customer) {
    //             return $this->response->setJSON(['status' => 'success', 'data' => $customer]);
    //         } else {
    //             return $this->response->setJSON(['status' => 'error', 'message' => 'Không tìm thấy thông tin người dùng.']);
    //         }
    //     }
    
    //     // Xử lý POST cho việc lưu thông tin
    //     if ($this->request->getMethod() === 'post') {
    //         $customerId = session()->get('customer_id');
    //         $data = [
    //             'name' => $this->request->getPost('name'),
    //             'phone' => $this->request->getPost('phone'),
    //             'address' => $this->request->getPost('address'),
    //         ];
    
    //         $customerModel = new \App\Models\CustomerModel();
    //         $update = $customerModel->update($customerId, $data);
    
    //         if ($update) {
    //             return $this->response->setJSON(['status' => 'success', 'message' => 'Cập nhật thông tin thành công.']);
    //         } else {
    //             return $this->response->setJSON(['status' => 'error', 'message' => 'Không thể cập nhật thông tin.']);
    //         }
    //     }
    // }
    

    
}
