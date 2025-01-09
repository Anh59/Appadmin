<?php namespace App\Models;

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'customer_id', 'tour_id', 'participants', 'room_quantity', 
        'booking_date','payment_method', 'payment_status', 'total_price', 'created_at', 'updated_at,payment_updated_at'
    ];
    protected $beforeUpdate = ['updatePaymentTimestamp'];

    protected function updatePaymentTimestamp(array $data)
    {
        if (isset($data['data']['payment_status']) && $data['data']['payment_status'] === 'completed') {
            $data['data']['payment_updated_at'] = date('Y-m-d H:i:s');
        }
        return $data;
    }
    

}
