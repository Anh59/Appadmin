<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomsModel extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'tour_id', 'price', 'cancellation', 'extra', 'image_url', 'created_at', 'updated_at'];
    protected $useTimestamps = true; // Sử dụng tự động timestamp
}
