<?php

namespace App\Models;

use CodeIgniter\Model;

class ToursModel extends Model
{
    protected $table = 'tours';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'start_date', 'end_date', 'location', 'participants', 'price_per_person', 'transport_id', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
