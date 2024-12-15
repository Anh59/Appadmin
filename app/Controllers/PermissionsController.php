<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class PermissionsController extends BaseController
{
    public function table()
    {
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
     * Trả về danh sách người dùng dưới dạng JSON với server-side processing.
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function tableuser_list()
    {
        $userModel = new UserModel();

        try {
            $request = $this->request;
            $draw = $request->getGet('draw');
            $start = $request->getGet('start');
            $length = $request->getGet('length');
            $searchValue = $request->getGet('search')['value'] ?? '';

            $query = $userModel->like('email', $searchValue)
                ->orLike('username', $searchValue);

            $totalRecords = $query->countAllResults(false);

            $data = $query->orderBy('created_at', 'DESC')
                ->findAll($length, $start);

            return $this->response
                ->setJSON([
                    'draw' => intval($draw),
                    'recordsTotal' => $userModel->countAll(),
                    'recordsFiltered' => $totalRecords,
                    'data' => $data
                ])
                ->setStatusCode(ResponseInterface::HTTP_OK);
        } catch (\Exception $e) {
            return $this->response
                ->setJSON(['success' => false, 'error' => $e->getMessage()])
                ->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function account()
    {
        $role = $this->request->getPost('role');

        if (!$role) {
            return $this->response
                ->setJSON(['success' => false, 'message' => 'Role không hợp lệ.'])
                ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Logic xử lý cập nhật role cho tài khoản (cần được triển khai)
        return $this->response
            ->setJSON(['success' => true, 'message' => 'Cập nhật role thành công.'])
            ->setStatusCode(ResponseInterface::HTTP_OK);
    }
    public function fetchTableUpdates()
{
    $userModel = new UserModel();
    try {
        $data = $userModel->orderBy('created_at', 'DESC')->findAll();
        return $this->response
            ->setJSON(['success' => true, 'data' => $data])
            ->setStatusCode(ResponseInterface::HTTP_OK);
    } catch (\Exception $e) {
        return $this->response
            ->setJSON(['success' => false, 'error' => $e->getMessage()])
            ->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
    }
}

}
