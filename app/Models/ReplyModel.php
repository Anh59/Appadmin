<?php

namespace App\Models;

use CodeIgniter\Model;

class ReplyModel extends Model
{
    protected $table = 'replies';
    protected $primaryKey = 'id';
    protected $allowedFields = ['consultation_id', 'user_id', 'reply_message', 'created_at'];
    protected $useTimestamps = false; // Vì chúng ta không sử dụng timestamps tự động
}
