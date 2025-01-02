<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BookingModel;
use App\Models\CustomerModel;
use App\Models\ToursModel;
class ManagebookingController extends BaseController
{
    public function table()
    {
        $bookingModel = new BookingModel();
        $customerModel = new CustomerModel();
        $tourModel = new ToursModel();

        // Lấy tất cả các booking
        $bookings = $bookingModel->findAll();

        // Lấy thông tin khách hàng và tour
        foreach ($bookings as &$booking) {
            $booking['customer_name'] = $customerModel->find($booking['customer_id'])['name'] ?? 'Chưa có tên';
            $booking['tour_name'] = $tourModel->find($booking['tour_id'])['name'] ?? 'Chưa có tên tour';
        }

        $data = [
            'bookings' => $bookings,
            'pageTitle' => 'Danh Sách Booking',
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                ['title' => 'Bookings', 'url' => route_to('Table_Bookings')],
            ]
        ];

        return view('Dashboard/booking/table', $data);
    }

    public function create()
    {
        $customerModel = new CustomerModel();
        $tourModel = new ToursModel();
    
        $customers = $customerModel->findAll();
        $tours = $tourModel->findAll();
    
        return view('Dashboard/booking/create', [
            'pageTitle' => 'Thêm Booking',
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                ['title' => 'Bookings', 'url' => route_to('Table_Bookings')],
                ['title' => 'Thêm', 'url' => route_to('Table_Bookings_Create')],
            ],
            'customers' => $customers,
            'tours' => $tours,
        ]);
    }

    public function store()
    {
        $bookingModel = new BookingModel();
        
        // Lấy dữ liệu từ form
        $data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'tour_id' => $this->request->getPost('tour_id'),
            'participants' => $this->request->getPost('participants'),
            'room_quantity' => $this->request->getPost('room_quantity'),
            'booking_date' => $this->request->getPost('booking_date'),
            'payment_method' => $this->request->getPost('payment_method'),
            'payment_status' => $this->request->getPost('payment_status'),
            'total_price' => $this->request->getPost('total_price'),
        ];

        // Lưu dữ liệu vào cơ sở dữ liệu
        $bookingModel->insert($data);

        // Chuyển hướng về danh sách booking và hiển thị thông báo thành công
        return redirect()->route('Table_Bookings')->with('success', 'Booking đã được thêm!');
    }

    public function details($id)
    {
        $bookingModel = new BookingModel();
        $booking = $bookingModel->find($id);

        if (!$booking) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Booking không tồn tại.');
        }

        return view('Dashboard/Bookings/details', [
            'booking' => $booking,
            'pageTitle' => 'Chi Tiết Booking',
        ]);
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();
        $tourModel = new ToursModel();
        $bookingModel = new BookingModel();
    
        $customers = $customerModel->findAll();
        $tours = $tourModel->findAll();
        $booking = $bookingModel->find($id);
    
        if (!$booking) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Booking không tồn tại.');
        }
    
        return view('Dashboard/booking/edit', [
            'booking' => $booking,
            'pageTitle' => 'Sửa Booking',
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                ['title' => 'Bookings', 'url' => route_to('Table_Bookings')],
                ['title' => 'Sửa', 'url' => route_to('Table_Bookings_Edit', $booking['id'])],
            ],
            'customers' => $customers,
            'tours' => $tours,
        ]);
    }

    public function update($id)
    {
        $bookingModel = new BookingModel();

        // Lấy dữ liệu từ form
        $data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'tour_id' => $this->request->getPost('tour_id'),
            'participants' => $this->request->getPost('participants'),
            'room_quantity' => $this->request->getPost('room_quantity'),
            'booking_date' => $this->request->getPost('booking_date'),
            'payment_method' => $this->request->getPost('payment_method'),
            'payment_status' => $this->request->getPost('payment_status'),
            'total_price' => $this->request->getPost('total_price'),
        ];

        // Cập nhật booking trong cơ sở dữ liệu
        $bookingModel->update($id, $data);

        // Chuyển hướng về danh sách booking và hiển thị thông báo thành công
        return redirect()->route('Table_Bookings')->with('success', 'Booking đã được cập nhật!');
    }

    public function delete($id)
    {
        $bookingModel = new BookingModel();
        $bookingModel->delete($id);

        return redirect()->route('Table_Bookings')->with('success', 'Booking đã được xóa!');
    }
    public function updatePaymentStatus()
    {
        if ($this->request->isAJAX()) {
            $bookingModel = new BookingModel();
            $id = $this->request->getPost('id');
            $paymentStatus = $this->request->getPost('payment_status');
    
            $data = [
                'payment_status' => $paymentStatus,
                'payment_updated_at' => date('Y-m-d H:i:s')
            ];
    
            if ($bookingModel->update($id, $data)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công.']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Cập nhật thất bại.']);
            }
        }
    
        return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ.']);
    }
    

}
