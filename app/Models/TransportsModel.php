<?php

namespace App\Models;

use CodeIgniter\Model;

class TransportsModel extends Model
{
    protected $table = 'transports';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'created_at', 'updated_at'];
    protected $useTimestamps = true; // Sử dụng tự động timestamp
}
