<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\BookingModel;
use App\Models\RoomsModel;
class BookingController extends ResourceController
{
    public function createBooking()
    {
        $data = $this->request->getJSON();
    
        // Lấy thông tin phòng
        $roomModel = new RoomsModel();
        $room = $roomModel->find($data->roomId);
    
        if (!$room) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Phòng không tồn tại']);
        }
    
        // Kiểm tra số lượng phòng khả dụng
        $requiredRooms = ceil($data->participants / 2); // Mỗi phòng chứa 2 người
        if ($room['available_quantity'] < $requiredRooms) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Không đủ số lượng phòng khả dụng. Cần ít nhất ' . $requiredRooms . ' phòng.'
            ]);
        }
    
        // Lưu thông tin đặt phòng
        $bookingModel = new BookingModel();
        $bookingData = [
            'customer_id' => $data->customerId,
            'tour_id' => $data->tourId,
            'participants' => $data->participants,
            'room_quantity' => $requiredRooms,
            'booking_date' => date('Y-m-d'),
            'total_price' => $requiredRooms * $room['price'] * $data->participants,
        ];
    
        if ($bookingModel->insert($bookingData)) {
            // Cập nhật số phòng khả dụng
            $roomModel->update($data->roomId, [
                'available_quantity' => $room['available_quantity'] - $requiredRooms,
            ]);
    
            return $this->response->setJSON(['status' => 'success', 'message' => 'Đặt phòng thành công']);
        }
    
        return $this->response->setJSON(['status' => 'error', 'message' => 'Đặt phòng thất bại']);
    }
    


}
