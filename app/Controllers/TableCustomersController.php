<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class TableCustomersController extends Controller
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function table()
    {
        $data['customers'] = $this->customerModel->findAll();
        return view('Dashboard/Customer/table', $data);
    }

    public function create()
    {
        return view('Dashboard/Customer/Create');
    }

    public function store()
    {
        // Validate input here if needed
        $this->customerModel->save($this->request->getPost());
        return redirect()->to(route_to('Table_Customers'))->with('success', 'Khách hàng đã được thêm thành công.');
    }

    public function edit($id)
    {
        $data['customer'] = $this->customerModel->find($id);
        return view('Dashboard/Customer/edit', $data);
    }

    public function update($id)
    {
        // Validate input here if needed
        $this->customerModel->update($id, $this->request->getPost());
        return redirect()->to(route_to('Table_Customers'))->with('success', 'Thông tin khách hàng đã được cập nhật thành công.');
    }

    public function delete($id)
    {
        $this->customerModel->delete($id);
        return redirect()->to(route_to('Table_Customers'))->with('success', 'Khách hàng đã được xóa thành công.');
    }
    //khóa 
    public function lockCustomer($id)
    {
        // Lấy thông tin khách hàng
        $customer = $this->customerModel->find($id);
        
        if ($customer) {
            // Cập nhật trạng thái của khách hàng (VD: "locked")
            $this->customerModel->update($id, ['status' => 'locked']);

            // Gửi email thông báo khóa tài khoản
            $email = \Config\Services::email();
            $email->setFrom('your-email@example.com', 'Travel Service Management');
            $email->setTo($customer['email']);
            $email->setSubject('Thông báo khóa tài khoản');
            $email->setMessage("Chào {$customer['name']},\n\nTài khoản của bạn đã bị khóa do vi phạm quy định. Vui lòng liên hệ với chúng tôi để biết thêm chi tiết.");

            if ($email->send()) {
                return redirect()->to(route_to('Table_Customers'))->with('success', 'Tài khoản đã được khóa và email thông báo đã được gửi.');
            } else {
                return redirect()->to(route_to('Table_Customers'))->with('error', 'Tài khoản đã được khóa nhưng không thể gửi email thông báo.');
            }
        } else {
            return redirect()->to(route_to('Table_Customers'))->with('error', 'Không tìm thấy khách hàng.');
        }
    }
    
}
