<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table      = 'news';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'content', 'author_id','category','comments_count','image','created_at','updated_at'];


}
