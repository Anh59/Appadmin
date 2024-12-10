<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\BookingModel;
use App\Models\RoomsModel;
use App\Models\CustomerModel;
use App\Models\ToursModel;
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
    if (!isset($data['payment_method']) || empty($data['total_price'])) {
        return redirect()->back()->with('error', 'Vui lòng điền đầy đủ thông tin.');
    }

    $bookingModel = new BookingModel();
    $paymentMethod = $data['payment_method'];
    $status = ($paymentMethod === 'office') ? 'pending' : 'initiated';

    // Save booking to database
    $bookingData = [
        'customer_id' => $session->get('customer_id'),
        'tour_id' => $data['tour_id'],
        'participants' => $data['participants'],
        'room_quantity' => json_encode($data['rooms']), // Save room details
        'booking_date' => date('Y-m-d H:i:s'),
        'total_price' => $data['total_price'],
        'payment_method' => $paymentMethod,
        'status' => $status,
    ];

    $bookingId = $bookingModel->insert($bookingData);

    if ($paymentMethod === 'office') {
        return redirect()->to('/booking/confirmation/' . $bookingId)->with('success', 'Đặt tour thành công! Đến văn phòng để thanh toán.');
    }

    // if ($paymentMethod === 'paypal') {
    //     // Redirect to PayPal API
    //     return $this->handlePayPalPayment($bookingId, $data['total_price']);
    // }

    // if ($paymentMethod === 'momo') {
    //     // Redirect to Momo API
    //     return $this->handleMomoPayment($bookingId, $data['total_price']);
    // }

    return redirect()->back()->with('error', 'Phương thức thanh toán không hợp lệ.');
}

    
    



}
