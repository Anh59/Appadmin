<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewsModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tour_id', 'customer_id', 'title', 'content', 'rating', 'created_at', 'updated_at'];
    protected $useTimestamps = true; // Sử dụng tự động timestamp
}
