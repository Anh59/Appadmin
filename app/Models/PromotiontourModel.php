<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotiontourModel extends Model
{
    protected $table = 'promotion_tour';
    protected $primaryKey = 'id';
    protected $allowedFields = ['promotion_id', 'tour_id'];
}
