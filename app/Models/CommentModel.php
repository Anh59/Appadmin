<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table      = 'comments';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $allowedFields = ['news_id', 'customer_id','title', 'comment','created_at','updated_at'];

    // Mối quan hệ với bảng News
    public function getNews()
    {
        return $this->belongsTo('App\Models\NewsModel', 'news_id');
    }

    // Mối quan hệ với bảng Customer
    public function getCustomer()
    {
        return $this->belongsTo('App\Models\CustomerModel', 'customer_id');
    }
}
