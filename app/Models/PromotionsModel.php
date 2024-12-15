<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionsModel extends Model
{
    protected $table = 'promotions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tour_id', 'promotion_details', 'start_date', 'end_date', 'discount_code', 'discount_value', 'applies_to_all_tours'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Mối quan hệ với bảng tours (foreign key)
    public function getTour($tour_id)
    {
        $this->builder()->select('tours.title')
            ->join('tours', 'tours.id = promotions.tour_id', 'left')  // Sử dụng join kiểu left join để lấy tất cả các tour
            ->where('promotions.tour_id', $tour_id);
        return $this->builder()->get()->getRow();
    }

    // Kiểm tra mã giảm giá có áp dụng cho tour cụ thể hay không
    public function isValidForTour($discount_code, $tour_id)
    {
        // Lấy thông tin của mã giảm giá
        $promotion = $this->where('discount_code', $discount_code)
                          ->where('start_date <=', date('Y-m-d'))
                          ->where('end_date >=', date('Y-m-d'))
                          ->first();

        // Nếu không có mã giảm giá hoặc không hợp lệ, trả về false
        if (!$promotion) {
            return false;
        }

        // Kiểm tra nếu mã giảm giá áp dụng cho tất cả các tour
        if ($promotion['applies_to_all_tours']) {
            return true;
        }

        // Kiểm tra nếu mã giảm giá áp dụng cho tour cụ thể
        if ($promotion['tour_id'] == $tour_id) {
            return true;
        }

        return false;
    }

    // Phương thức lấy thông tin giảm giá cho mã giảm giá
    public function getDiscountValue($discount_code)
    {
        $promotion = $this->where('discount_code', $discount_code)
                          ->where('start_date <=', date('Y-m-d'))
                          ->where('end_date >=', date('Y-m-d'))
                          ->first();

        // Trả về giá trị giảm giá nếu mã hợp lệ
        if ($promotion) {
            return $promotion['discount_value'];
        }

        return 0; // Trả về 0 nếu mã giảm giá không hợp lệ
    }
    public function getToursByPromotion($promotion_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('promotion_tour');
        $builder->select('tours.name');
        $builder->join('tours', 'tours.id = promotion_tour.tour_id');
        $builder->where('promotion_tour.promotion_id', $promotion_id);
        $query = $builder->get();
    
        // Kiểm tra kết quả trả về
        return $query->getResultArray(); // Trả về một mảng kết quả
    }
    
}
