<?php

namespace App\Models;

use CodeIgniter\Model;

class TransportsModel extends Model
{
    protected $table = 'transports';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'driver_name','vehicle_number', 'created_at', 'updated_at','type'];
    protected $useTimestamps = true; // Sử dụng tự động timestamp
}
