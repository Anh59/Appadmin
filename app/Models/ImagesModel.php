<?php

namespace App\Models;

use CodeIgniter\Model;

class ImagesModel extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tour_id', 'image_url', 'created_at', 'updated_at'];
    protected $useTimestamps = true; // Sử dụng tự động timestamp
}
