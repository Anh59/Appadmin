<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\BookingModel;
use App\Models\RoomsModel;
use App\Models\CustomerModel;
use App\Models\ToursModel;
use App\Models\PromotionsModel;
use App\Models\BookingRoomsModel;
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
    // phần trên bỏ không liên quan

        public function checkout($tourId)
        {
            $session = session();
            $isLoggedIn = $session->has('customer_id');
            
            // Fetch customer data if logged in
            $customer = null;
            if ($isLoggedIn) {
                $customerModel = new CustomerModel();
                $customer = $customerModel->find($session->get('customer_id'));
            }
        
            $tourModel = new ToursModel();
            $tour = $tourModel->find($tourId);
            
            // Check if the tour exists
            if (!$tour) {
                return redirect()->to('/')->with('error', 'Tour không tồn tại.');
            }
            
            // Get room information for the tour
            $roomModel = new RoomsModel();
            $rooms = $roomModel->where('tour_id', $tourId)->findAll();
            
            // Calculate total room price
            $totalPrice = 0;
            foreach ($rooms as $room) {
                $totalPrice += $room['price'];
            }
        
            // Pass data to the view
            return view('home/checkout', [
                'tour' => $tour,
                'rooms' => $rooms,
                'totalPrice' => $totalPrice,
                'price_per_person' => $tour['price_per_person'],
                'customer' => $customer, // Pass customer data if logged in
            ]);
        }
        
        public function processPayment()
        {
            $session = session();
            $data = $this->request->getPost();
        
            // Validate input
            if (!isset($data['payment_method']) || empty($data['total_price']) || empty($data['rooms'])) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Vui lòng điền đầy đủ thông tin.',
                ]);
            }
        
            $bookingModel = new BookingModel();
            $paymentMethod = $data['payment_method'];
            $status = ($paymentMethod === 'office') ? 'pending' : 'initiated';
        
            // Kiểm tra sự tồn tại của discount_value trong mảng $data
            $discount_value = isset($data['discount_value']) ? $data['discount_value'] : 0;
        
            // Tính tổng tiền sau giảm giá
            $totalAmount = $data['total_price'] - $discount_value;
        
            // Save booking to database
            $bookingData = [
                'customer_id' => $session->get('customer_id'),
                'tour_id' => $data['tour_id'],
                'participants' => $data['participants'],
                'room_quantity' => json_encode($data['rooms']),
                'booking_date' => date('Y-m-d H:i:s'),
                'total_price' => $data['total_price'],
                'payment_method' => $paymentMethod,
                'status' => $status,
                'discount_code' => $data['discount_code'] ?? null,
                'discount_value' => $discount_value,
            ];
        
            $bookingId = $bookingModel->insert($bookingData);
        
            if ($bookingId) {
                // Insert room details
                $bookingRoomsModel = new BookingRoomsModel();
                foreach ($data['rooms'] as $roomId => $quantity) {
                    if ($quantity > 0) {
                        $roomModel = new RoomsModel();
                        $room = $roomModel->find($roomId);
        
                        $roomData = [
                            'booking_id' => $bookingId,
                            'room_id' => $roomId,
                            'quantity' => $quantity,
                        ];
                        $bookingRoomsModel->insert($roomData);
                    }
                }
        
                // Fetch customer email
                $customerModel = new CustomerModel();
                $customer = $customerModel->find($session->get('customer_id'));
                $email = $customer['email'];
        
                // Fetch tour and room details
                $tourModel = new ToursModel();
                $tour = $tourModel->find($data['tour_id']);
                $rooms = $data['rooms'];
                $participants = $data['participants'];
        
                // Tính tổng tiền sau giảm giá
                $totalAmount = $data['total_price'] - $discount_value; // Giảm giá
        
                $roomDetails = [];
                foreach ($data['rooms'] as $roomId => $quantity) {
                    if ($quantity > 0) {
                        $roomModel = new RoomsModel();
                        $room = $roomModel->find($roomId);
                        $roomDetails[] = [
                            'name' => $room['name'], // Tên loại phòng
                            'quantity' => $quantity, // Số lượng loại phòng
                            'price' => $room['price'], // Giá phòng
                            'total_price' => $room['price'] * $quantity // Tổng giá phòng
                        ];
                    }
                }
        
                // Send confirmation email
                $emailService = \Config\Services::email();
                $emailService->setTo($email);
                $emailService->setSubject('Xác nhận đặt tour');
                $emailService->setMessage(view('home/booking_confirmation', [
                    'tour' => $tour,
                    'rooms' => $roomDetails,
                    'participants' => $participants,
                    'total_price' => $data['total_price'],
                    'discount_code' => $data['discount_code'] ?? 'Không có',
                    'discount_value' => $discount_value,
                    'customer' => $customer,
                    'totalAmount' => $totalAmount,
                    'bookingId' => $bookingId,//truyền giá trị cho email xem thông tin đơn
                ]));
        
                if (!$emailService->send()) {
                    log_message('error', 'Gửi email thất bại: ' . $emailService->printDebugger(['headers']));
                }
        
                $response = ['success' => true];
                $response['message'] = 'Đặt tour thành công!';
        
                // Handle other payment methods (PayPal, MoMo)
                if ($paymentMethod === 'COD') {
                    $response['redirect_url'] = site_url(route_to('config_order'));
                }
        
                if ($paymentMethod === 'paypal') {
                    $response['redirect_url'] = "https://www.paypal.com/checkout?amount={$data['total_price']}&bookingId={$bookingId}";
                }
        
                if ($paymentMethod === 'momo') {
                    $response['redirect_url'] = "https://www.momo.vn/checkout?amount={$data['total_price']}&bookingId={$bookingId}";
                }
        
                return $this->response->setJSON($response);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Có lỗi xảy ra khi xử lý đặt tour.',
                ]);
            }
        }
        
        
        

        
        

        
        public function applyDiscount()
        {
            $discountCode = $this->request->getPost('discount_code');
            $tourId = $this->request->getPost('tour_id');
            $totalPrice = $this->request->getPost('total_price');
        
            $promotionsModel = new PromotionsModel();
            $discountValue = 0;
        
            if ($promotionsModel->isValidForTour($discountCode, $tourId)) {
                $discountValue = $promotionsModel->getDiscountValue($discountCode);
            }
        
            // Trả về phản hồi JSON
            return $this->response->setJSON([
                'success' => $discountValue > 0,
                'discount_value' => $discountValue,
                'message' => $discountValue > 0 ? 'Mã giảm giá đã được áp dụng!' : 'Mã giảm giá không hợp lệ.'
            ]);
        }
        

 
    



}
