<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['setting_name', 'setting_value', 'description', 'created_at', 'updated_at'];
    protected $useTimestamps = true; // Sử dụng tự động timestamp
}
