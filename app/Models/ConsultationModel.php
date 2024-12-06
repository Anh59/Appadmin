<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultationModel extends Model
{
    protected $table = 'consultations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'subject', 'message','created_at','updated_at'];
    protected $useTimestamps = true;
}
