<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\BookingModel;

class BookingController extends ResourceController
{
    public function createBooking()
    {
        // Lấy dữ liệu JSON từ request
        $data = $this->request->getJSON();

        // Khởi tạo model Booking
        $bookingModel = new BookingModel();

        // Dữ liệu cần lưu vào bảng bookings
        $bookingData = [
            'room_id'        => $data->roomId,
            'customer_name'  => $data->customerName,
            'participants'   => $data->participants,
            'booking_date'   => $data->bookingDate,
            'total_price'    => $data->totalPrice,
            'additional_request' => $data->additionalRequest // Lưu yêu cầu thêm
        ];

        // Chèn dữ liệu vào bảng bookings
        if ($bookingModel->insert($bookingData)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error']);
        }
    }
}
