<?php namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    // Định nghĩa tên bảng
    protected $table = 'bookings';

    // Định nghĩa các cột có thể được gán
    protected $allowedFields = ['tour_id', 'room_id', 'customer_name', 'participants', 'booking_date', 'total_price'];

    // Định nghĩa các trường tự động thời gian
    protected $useTimestamps = true;

    // Định nghĩa các trường để sử dụng cho quá trình tạo và cập nhật dữ liệu
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Nếu bạn muốn sử dụng validation
    protected $validationRules = [
        'tour_id'        => 'required|integer',
        'room_id'        => 'required|integer',
        'customer_name'  => 'required|string',
        'participants'   => 'required|integer',
        'booking_date'   => 'required|valid_date',
        'total_price'    => 'required|decimal',
    ];

    // Các thông báo lỗi
    protected $validationMessages = [
        'tour_id' => [
            'required' => 'Tour ID là bắt buộc.',
        ],
        'room_id' => [
            'required' => 'Room ID là bắt buộc.',
        ],
        'customer_name' => [
            'required' => 'Tên khách hàng là bắt buộc.',
        ],
        'participants' => [
            'required' => 'Số người tham gia là bắt buộc.',
        ],
        'booking_date' => [
            'required' => 'Ngày đặt phòng là bắt buộc.',
        ],
        'total_price' => [
            'required' => 'Giá tổng là bắt buộc.',
        ],
    ];

    // Có thể thêm thêm các phương thức khác như `findBookingByCustomer` nếu cần
}
