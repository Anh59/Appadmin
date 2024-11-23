<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
class PermissionsController extends BaseController
{
    public function table()
    {
        // Gửi dữ liệu cần thiết đến view (nếu có)
        $data = [
            'pageTitle' => 'Danh sách quyền',
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                ['title' => 'Quản lý quyền', 'url' => route_to('Table_Permissions')],
            ],
        ];

        return view('Dashboard/permissions/table', $data);
    }

    /**
     * Trả về danh sách người dùng dưới dạng JSON.
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function tableuser_list()
    {
        $userModel = new UserModel();

        try {
            $data = $userModel->findAll(); // Lấy danh sách tất cả người dùng

            return $this->response
                ->setJSON(['success' => true, 'data' => $data])
                ->setStatusCode(ResponseInterface::HTTP_OK);
        } catch (\Exception $e) {
            return $this->response
                ->setJSON(['success' => false, 'error' => $e->getMessage()])
                ->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Cập nhật quyền cho tài khoản dựa trên role.
     */
    public function account()
    {
        $role = $this->request->getPost('role'); // Nhận giá trị role từ request

        if (!$role) {
            return $this->response
                ->setJSON(['success' => false, 'message' => 'Role không hợp lệ.'])
                ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Thực hiện logic xử lý role (ví dụ: cập nhật quyền cho tài khoản)
        // Giả sử thêm logic xử lý cụ thể tại đây.

        return $this->response
            ->setJSON(['success' => true, 'message' => 'Cập nhật role thành công.'])
            ->setStatusCode(ResponseInterface::HTTP_OK);
    }
}
