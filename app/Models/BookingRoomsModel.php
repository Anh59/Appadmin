<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingRoomsModel extends Model
{
    protected $table = 'booking_room';
    protected $primaryKey = 'id';
    protected $allowedFields = ['booking_id', 'room_id', 'quantity'];
}