<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CustomerModel;
use App\Models\BookingModel;
use App\Models\ToursModel;
use App\Models\ImagesModel;
use App\Models\ReviewsModel;
use App\Models\BookingRoomsModel;
use App\Models\RoomsModel;
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
    
        // Lấy thông tin từ form
        $data = [
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ];
    
        // Xử lý hình ảnh mới nếu được tải lên
        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            // Tạo tên ảnh ngẫu nhiên
            $newName = $imageFile->getRandomName();
            // Đường dẫn lưu ảnh mới: FCPATH . 'uploads/avatar'
            $imageFile->move(FCPATH . 'uploads/avatar', $newName);
            $newImageUrl = base_url('uploads/avatar/' . $newName);
            $data['image_url'] = $newImageUrl;
    
            // Xóa hình ảnh cũ nếu có
            $oldImage = $customerModel->find($customerId)['image_url'];
            if ($oldImage && file_exists(FCPATH . 'uploads/avatar/' . basename($oldImage))) {
                unlink(FCPATH . 'uploads/avatar/' . basename($oldImage));
            }
    
            // Cập nhật lại ảnh trong session
            session()->set('customer_avatar', $newImageUrl);
        }
    
        // Kiểm tra email mới
        $newEmail = $this->request->getPost('email');
        $oldEmail = $this->request->getPost('old_email');
    
        if ($newEmail != $oldEmail) {
            $existingCustomer = $customerModel->where('email', $newEmail)->first();
            if ($existingCustomer) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Email này đã được đăng ký. Vui lòng chọn email khác.',
                ]);
            }
    
            // Gửi OTP và lưu email chờ xác nhận
            $otp = rand(100000, 999999);
            $otp_expiration = date('Y-m-d H:i:s', strtotime('+5 minutes'));
    
            $customerModel->update($customerId, [
                'otp' => $otp,
                'otp_expiration' => $otp_expiration,
            ]);
    
            session()->set('pending_email', $newEmail);
            $this->_sendOTP($newEmail, $otp);
    
            return redirect()->route('verifyChangeEmailOTP');
        }
    
        // Cập nhật thông tin cá nhân trong cơ sở dữ liệu
        $customerModel->update($customerId, $data);
    
        // Cập nhật lại thông tin trong session
        session()->set('customer_name', $data['name']);
    
        // Thông báo thành công
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


    
    private function mapBookingStatus($status)
    {
        switch ($status) {
            case 'pending':
                return 'Đang chờ thanh toán';
            case 'completed':
                return 'Đã thanh toán';
            case 'order_completed':
                return 'Đã hoàn thành';
            case 'failed':
                return 'Đã hủy';
            default:
                return 'không xác định';
        }
    }
    public function order()
    {
        $customerId = session()->get('customer_id');
        $searchQuery = $this->request->getGet('search') ?? '';
    
        $bookingModel = new BookingModel();
        $imagesModel = new ImagesModel(); // Khởi tạo model hình ảnh
    
        // Tìm kiếm đơn hàng có trạng thái "pending"
        $bookingsQuery = $bookingModel
            ->select('bookings.*, tours.name as tour_name, tours.description as tour_description, tours.price_per_person')
            ->join('tours', 'tours.id = bookings.tour_id')
            ->where('bookings.customer_id', $customerId)
            ->where('bookings.payment_status', 'pending') // Lọc trạng thái "pending"
            ->like('tours.name', $searchQuery)
            ->orderBy('bookings.id', 'desc'); // Sắp xếp theo ngày tạo
    
        // Lấy dữ liệu phân trang
        $perPage = 5;
        $bookings = $bookingsQuery->paginate($perPage, 'group1');
    
        // Gắn trạng thái đơn hàng và hình ảnh
        foreach ($bookings as &$booking) {
            $booking['status_text'] = $this->mapBookingStatus($booking['payment_status']);
    
            // Lấy hình ảnh đầu tiên của tour
            $image = $imagesModel->where('tour_id', $booking['tour_id'])->first(); // Lấy ảnh đầu tiên
            $booking['tour_image'] = $image ? $image['image_url'] : ''; // Nếu có ảnh thì lấy, nếu không thì để trống
        }
    
        // Trả về view
        return view('customer/order', [
            'bookings' => $bookings,
            'pager' => $bookingModel->pager, // Đảm bảo truyền đúng đối tượng Pager
            'searchQuery' => $searchQuery,
        ]);
    }

    public function history_order()
    {
        $customerId = session()->get('customer_id');
        $searchQuery = $this->request->getGet('search') ?? '';
    
        $bookingModel = new BookingModel();
        $imagesModel = new ImagesModel(); // Khởi tạo model hình ảnh
    
        // Lấy danh sách đơn hàng có các trạng thái cần hiển thị
        $bookingsQuery = $bookingModel
            ->select('bookings.*, tours.name as tour_name, tours.description as tour_description, tours.price_per_person')
            ->join('tours', 'tours.id = bookings.tour_id')
            ->where('bookings.customer_id', $customerId)
            ->whereIn('bookings.payment_status', ['completed', 'order_completed', 'failed']) // Thêm các trạng thái cần hiển thị
            ->like('tours.name', $searchQuery)
            ->orderBy('bookings.id', 'desc'); // Sắp xếp theo ngày tạo
    
        // Sử dụng phân trang
        $perPage = 5; // Số lượng đơn hàng mỗi trang
        $bookings = $bookingsQuery->paginate($perPage, 'group1'); // Tự động xử lý trang hiện tại
    
        // Lấy hình ảnh của tour
        foreach ($bookings as &$booking) {
            $booking['status_text'] = $this->mapBookingStatus($booking['payment_status']);
    
            // Lấy hình ảnh đầu tiên của tour
            $image = $imagesModel->where('tour_id', $booking['tour_id'])->first(); // Lấy ảnh đầu tiên
            $booking['tour_image'] = $image ? $image['image_url'] : ''; // Nếu có ảnh thì lấy, nếu không thì để trống
        }
    
        // Trả về view
        return view('customer/history_order', [
            'bookings' => $bookings,
            'pager' => $bookingModel->pager,
            'searchQuery' => $searchQuery,
        ]);
    }
    

    public function detail_order($bookingId)
    {
        $customerId = session()->get('customer_id');
        $bookingModel = new BookingModel();
        $imagesModel = new ImagesModel();
        $bookingRoomsModel = new BookingRoomsModel();
        $roomsModel = new RoomsModel();
        $customerModel = new CustomerModel(); // Load the Customer model
    
        // Lấy thông tin đơn đặt hàng
        $booking = $bookingModel
            ->select('bookings.*, tours.name as tour_name, tours.price_per_person, tours.description as tour_description, tours.location as tour_location')
            ->join('tours', 'tours.id = bookings.tour_id')
            ->where('bookings.id', $bookingId)
            ->where('bookings.customer_id', $customerId)
            ->first();
    
        if (!$booking) {
            return redirect()->to('/history_order');
        }
    
        // Lấy tất cả hình ảnh của tour
        $images = $imagesModel->where('tour_id', $booking['tour_id'])->findAll();
    
        // Lấy thông tin phòng đã đặt
        $bookingRooms = $bookingRoomsModel->where('booking_id', $bookingId)->findAll();
    
        // Kết hợp thông tin giá phòng từ bảng rooms
        foreach ($bookingRooms as &$room) {
            $roomDetails = $roomsModel->find($room['room_id']); // Lấy thông tin chi tiết phòng
            if ($roomDetails) {
                $room['room_name'] = $roomDetails['name'];
                $room['image_url'] = $roomDetails['image_url'];
                $room['cancellation'] = $roomDetails['cancellation']; // Lấy thông tin  phòng
                $room['extra'] = $roomDetails['extra'];
                $room['price'] = $roomDetails['price'];
            }
        }
    
        // Lấy thông tin người dùng
        $customer = $customerModel->find($customerId);
    
        // Trả về view và truyền thông tin về đơn đặt hàng, tour và người dùng
        return view('customer/detail_order', [
            'booking' => $booking,
            'tour_images' => $images,
            'booking_rooms' => $bookingRooms,
            'customer' => $customer, // Pass customer data to view
        ]);
    }
    public function detail_history_order($bookingId)
{
    $customerId = session()->get('customer_id');
    $bookingModel = new BookingModel();
    $imagesModel = new ImagesModel();
    $bookingRoomsModel = new BookingRoomsModel();
    $roomsModel = new RoomsModel();
    $customerModel = new CustomerModel();

    // Lấy thông tin đơn đặt hàng
    $booking = $bookingModel
        ->select('bookings.*, tours.name as tour_name, tours.price_per_person, tours.description as tour_description, tours.location as tour_location')
        ->join('tours', 'tours.id = bookings.tour_id')
        ->where('bookings.id', $bookingId)
        ->where('bookings.customer_id', $customerId)
        ->where('bookings.payment_status', 'completed') // Chỉ lấy đơn đã thanh toán
        ->first();

    if (!$booking) {
        return redirect()->to('/history_order');
    }

    // Lấy tất cả hình ảnh của tour
    $images = $imagesModel->where('tour_id', $booking['tour_id'])->findAll();

    // Lấy thông tin phòng đã đặt
    $bookingRooms = $bookingRoomsModel->where('booking_id', $bookingId)->findAll();

    // Kết hợp thông tin giá phòng từ bảng rooms
    foreach ($bookingRooms as &$room) {
        $roomDetails = $roomsModel->find($room['room_id']);
        if ($roomDetails) {
            $room['room_name'] = $roomDetails['name'];
            $room['image_url'] = $roomDetails['image_url'];
            $room['cancellation'] = $roomDetails['cancellation'];
            $room['extra'] = $roomDetails['extra'];
            $room['price'] = $roomDetails['price'];
        }
    }

    // Lấy thông tin người dùng
    $customer = $customerModel->find($customerId);

    // Trả về view
    return view('customer/detail_history_order', [
        'booking' => $booking,
        'tour_images' => $images,
        'booking_rooms' => $bookingRooms,
        'customer' => $customer,
    ]);
}

    
    
    


public function reviews($bookingId)
{
    $customerId = session()->get('customer_id');
    $bookingModel = new BookingModel();
    $reviewsModel = new ReviewsModel();
    $imagesModel = new ImagesModel();
    $bookingRoomsModel = new BookingRoomsModel();
    $roomsModel = new RoomsModel(); // Model để lấy thông tin phòng

    // Lấy thông tin đơn đặt hàng
    $booking = $bookingModel
        ->select('bookings.*, tours.name as tour_name, tours.price_per_person, tours.description as tour_description')
        ->join('tours', 'tours.id = bookings.tour_id')
        ->where('bookings.id', $bookingId)
        ->where('bookings.customer_id', $customerId)
        ->first();

    if (!$booking) {
        return redirect()->to('/history_order');
    }

    // Lấy tất cả hình ảnh của tour
    $images = $imagesModel->where('tour_id', $booking['tour_id'])->findAll();

    // Lấy thông tin phòng đã đặt
    $bookingRooms = $bookingRoomsModel->where('booking_id', $bookingId)->findAll();

    // Kết hợp thông tin giá phòng từ bảng rooms
    foreach ($bookingRooms as &$room) {
        $roomDetails = $roomsModel->find($room['room_id']); // Lấy thông tin chi tiết phòng
        if ($roomDetails) {
            $room['room_name'] = $roomDetails['name'];
            $room['image_url'] = $roomDetails['image_url'];
            $room['cancellation'] = $roomDetails['cancellation']; // Lấy thông tin  phòng
            $room['extra'] = $roomDetails['extra'];
            $room['price'] = $roomDetails['price'];
        }
    }

    // Kiểm tra nếu người dùng đã đánh giá tour này rồi
    $existingReview = $reviewsModel
        ->where('tour_id', $booking['tour_id'])
        ->where('customer_id', $customerId)
        ->first();

    // Xử lý đánh giá (nếu gửi POST request)
    if ($this->request->getMethod() === 'post') {
        $reviewData = [
            'tour_id' => $booking['tour_id'],
            'customer_id' => $customerId,
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'rating' => $this->request->getPost('rating'),
        ];

        $reviewsModel->save($reviewData);
        return redirect()->to('/history_order')->with('message', 'Đánh giá của bạn đã được lưu.');
    }

    // Trả về view
    return view('customer/reviews', [
        'booking' => $booking,
        'existingReview' => $existingReview,
        'tour_images' => $images,
        'booking_rooms' => $bookingRooms, // Truyền thông tin phòng đã đặt
    ]);
}



public function submitReview($bookingId)
{
    $customerId = session()->get('customer_id');
    $reviewsModel = new ReviewsModel();

    // Lấy thông tin đơn đặt hàng
    $bookingModel = new BookingModel();
    $booking = $bookingModel
        ->where('id', $bookingId)
        ->where('customer_id', $customerId)
        ->first();

    if (!$booking) {
        return redirect()->to('/history_order');
    }

    // Lưu đánh giá
    $reviewData = [
        'tour_id' => $booking['tour_id'],
        'customer_id' => $customerId,
        'title' => $this->request->getPost('title'),
        'content' => $this->request->getPost('content'),
        'rating' => $this->request->getPost('rating'),
    ];

    // Thêm đánh giá vào cơ sở dữ liệu
    $reviewsModel->save($reviewData);

    // Quay lại trang lịch sử đơn hàng với thông báo
    return redirect()->route('/history_order')->with('message', 'Đánh giá của bạn đã được lưu.');
}

public function delete_order($bookingId)
{
    $customerId = session()->get('customer_id');
    $bookingModel = new BookingModel();

    // Xác minh quyền sở hữu
    $booking = $bookingModel->where('id', $bookingId)->where('customer_id', $customerId)->first();

    if (!$booking) {
        return redirect()->route('history_order')->with('error', 'Đơn hàng không tồn tại.');
    }

    // Xóa đơn đặt hàng
    $bookingModel->delete($bookingId);

    return redirect()->route('history_order')->with('success', 'Xóa đơn hàng thành công.');
}
public function reorder($bookingId)
{
    $customerId = session()->get('customer_id');
    $bookingModel = new BookingModel();

    // Xác minh quyền sở hữu
    $booking = $bookingModel->where('id', $bookingId)->where('customer_id', $customerId)->first();

    if (!$booking) {
        return redirect()->to('/history_order')->with('error', 'Đơn hàng không tồn tại.');
    }

    // Chuyển hướng đến trang đặt chuyến đi với tour_id
    return redirect()->to('/booking/checkout/' . $booking['tour_id']);
}
public function cancelOrder($id)
{
    $customerId = session()->get('customer_id'); // Lấy ID khách hàng từ session
    $bookingModel = new BookingModel();

    // Kiểm tra xem đơn hàng thuộc về khách hàng và đang ở trạng thái "pending"
    $booking = $bookingModel->where('id', $id)
                            ->where('customer_id', $customerId)
                            ->where('payment_status', 'pending')
                            ->first();

    if (!$booking) {
        return redirect()->route('order')->with('error', 'Không tìm thấy đơn hàng hoặc không thể huỷ.');
    }

    // Cập nhật trạng thái đơn hàng thành "failed"
    $bookingModel->update($id, ['payment_status' => 'failed']);

    return redirect()->route('order')->with('success', 'Đơn hàng đã được huỷ thành công.');
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
