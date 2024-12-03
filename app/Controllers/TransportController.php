<?php

namespace App\Controllers;

use App\Models\TransportsModel;
use CodeIgniter\Controller;

class TransportController extends Controller
{
    public function table()
    {
        $transportsModel = new TransportsModel();

        // Fetch all transports
        $transports = $transportsModel->findAll();

        $data = [
            'transports' => $transports,
            'pageTitle' => 'Danh Sách Phương Tiện',
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                ['title' => 'Transports', 'url' => route_to('Table_Transports')],
            ]
        ];

        return view('Dashboard/Transports/table', $data);
    }

    public function create()
    {
        return view('Dashboard/Transports/create', [
            'pageTitle' => 'Thêm Phương Tiện',
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                ['title' => 'Transports', 'url' => route_to('Table_Transports')],
                ['title' => 'Thêm', 'url' => route_to('Table_Transports_Create')],
            ],
        ]);
    }
    


    public function store()
    {
        $transportsModel = new TransportsModel();
        
        // Lấy dữ liệu từ form
        $data = [
            'name' => $this->request->getPost('name'),
            'driver_name' => $this->request->getPost('driver_name'),
            'vehicle_number' => $this->request->getPost('vehicle_number'),
            'type' => $this->request->getPost('type'),
        ];
        // var_dump($data);
        // die();

        // Lưu dữ liệu vào cơ sở dữ liệu
        $transportsModel->insert($data);
        log_message('debug', 'New transport ID: ' . $transportsModel->getInsertID());
        // Chuyển hướng về danh sách phương tiện và hiển thị thông báo thành công
        return redirect()->route('Table_Transports')->with('success', 'Phương tiện đã được thêm!');
    }
    

    public function details($id)
    {
        $transportsModel = new TransportsModel();
        $transport = $transportsModel->find($id);

        if (!$transport) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Phương tiện không tồn tại.');
        }

        return view('Dashboard/Transports/details', [
            'transport' => $transport,
            'pageTitle' => 'Chi Tiết Phương Tiện',
        ]);
    }

    public function edit($id)
    {
        $transportsModel = new TransportsModel();
        $transport = $transportsModel->find($id);
    
        if (!$transport) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Phương tiện không tồn tại.');
        }
    
        return view('Dashboard/Transports/edit', [
            'transport' => $transport,
            'pageTitle' => 'Sửa Phương Tiện',
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                ['title' => 'Transports', 'url' => route_to('Table_Transports')],
                ['title' => 'Sửa', 'url' => route_to('Table_Transports_Edit', $transport['id'])],
            ],
        ]);
    }
    

    public function update($id)
    {
        $transportsModel = new TransportsModel();
    
        // Lấy dữ liệu từ form
        $data = [
            'name' => $this->request->getPost('name'),
            'driver_name' => $this->request->getPost('driver_name'),
            'vehicle_number' => $this->request->getPost('vehicle_number'),
            'type' => $this->request->getPost('type'),
        ];
    
        // Cập nhật phương tiện trong cơ sở dữ liệu
        $transportsModel->update($id, $data);
    
        // Chuyển hướng về danh sách phương tiện và hiển thị thông báo thành công
        return redirect()->route('Table_Transports')->with('success', 'Phương tiện đã được cập nhật!');
    }
    

    public function delete($id)
    {
        $transportsModel = new TransportsModel();
        $transportsModel->delete($id);

        return redirect()->route('Table_Transports')->with('Deleted', 'Phương tiện đã được xóa!');
    }
}