<?php namespace App\Models;

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'customer_id', 'tour_id', 'participants', 'room_quantity', 
        'booking_date', 'total_price', 'created_at', 'updated_at'
    ];
}
