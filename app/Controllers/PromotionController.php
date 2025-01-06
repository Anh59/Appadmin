<?php

namespace App\Controllers;

use App\Models\PromotionsModel;
use CodeIgniter\Controller;
use App\Models\ToursModel;

class PromotionController extends Controller
{
    public function table()
    {
        $promotionsModel = new PromotionsModel();
        $tourModel = new ToursModel();
        
        // Lấy tất cả mã giảm giá
        $promotions = $promotionsModel->findAll();
        
        // Lấy danh sách các tour cho từng mã giảm giá
        foreach ($promotions as &$promotion) {
            // Kiểm tra nếu mã giảm giá áp dụng cho tất cả các tour hoặc cho một số tour cụ thể
            if ($promotion['applies_to_all_tours'] == 1) {
                $promotion['tour_names'] = 'Áp dụng cho tất cả các tour';
            } else {
                // Lấy các tour áp dụng mã giảm giá
                $promotion['tour_names'] = $promotionsModel->getToursByPromotion($promotion['id']);
            }
        }
        
        $data = [
            'promotions' => $promotions, // Truyền dữ liệu vào view
            'pageTitle' => 'Danh Sách Mã Giảm Giá',
            'breadcrumb' => [
                ['title' => 'Thống kê', 'url' => route_to('Dashboard_table')],
                ['title' => 'Mã Giảm Giá', 'url' => route_to('Table_Promotions')],
            ]
        ];
        
        return view('Dashboard/Promotions/table', $data);
    }
    

    
    

    public function create()
    {
        $tourModel = new ToursModel();
        $tours = $tourModel->findAll();

        return view('Dashboard/Promotions/create', [
            'pageTitle' => 'Thêm Mã Giảm Giá',
            'breadcrumb' => [
                ['title' => 'Thống kê', 'url' => route_to('Dashboard_table')],
                ['title' => 'Mã Giảm Giá', 'url' => route_to('Table_Promotions')],
                ['title' => 'Thêm Mã Giảm Giá', 'url' => route_to('Table_Promotions_Create')],
            ],
            'tours' => $tours,
        ]);
    }

    public function store()
    {
        $promotionsModel = new PromotionsModel();
        $promotionTourModel = new \App\Models\PromotionTourModel(); // Tạo mô hình cho bảng promotion_tour
        
        // Lấy dữ liệu từ form
        $data = [
            'discount_code' => $this->request->getPost('discount_code'),
            'promotion_details' => $this->request->getPost('promotion_details'),
            'discount_value' => $this->request->getPost('discount_value'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'applies_to_all_tours' => $this->request->getPost('applies_to_all_tours') ? 1 : 0, // Kiểm tra xem có áp dụng cho tất cả tour không
        ];
    
        // Lưu mã giảm giá vào bảng promotions
        $promotionId = $promotionsModel->insert($data);
        
        // Nếu không áp dụng cho tất cả các tour, lưu các tour cụ thể vào bảng promotion_tour
        if ($data['applies_to_all_tours'] == 0 && $this->request->getPost('tour_ids')) {
            $tourIds = $this->request->getPost('tour_ids');
            
            // Lưu thông tin vào bảng promotion_tour
            foreach ($tourIds as $tourId) {
                $promotionTourModel->insert([
                    'promotion_id' => $promotionId,
                    'tour_id' => $tourId
                ]);
            }
        }
    
        return redirect()->route('Table_Promotions')->with('success', 'Mã giảm giá đã được thêm!');
    }
    

    public function edit($id)
    {
        $promotionsModel = new PromotionsModel();
        $promotion = $promotionsModel->find($id);
    
        if (!$promotion) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mã giảm giá không tồn tại.');
        }
    
        $tourModel = new ToursModel();
        $tours = $tourModel->findAll();
    
        // Lấy danh sách tour áp dụng cho mã giảm giá
        $promotionTourModel = new \App\Models\PromotionTourModel();
        $selectedTours = $promotionTourModel->where('promotion_id', $id)->findAll();
        $selectedTourIds = array_column($selectedTours, 'tour_id'); // Lấy danh sách ID các tour đã chọn
    
        return view('Dashboard/Promotions/edit', [
            'promotion' => $promotion,
            'tours' => $tours,
            'selectedTourIds' => $selectedTourIds, // Truyền danh sách ID các tour đã chọn vào view
            'pageTitle' => 'Sửa Mã Giảm Giá',
            'breadcrumb' => [
                ['title' => 'Thống kê', 'url' => route_to('Dashboard_table')],
                ['title' => 'Mã Giảm Giá', 'url' => route_to('Table_Promotions')],
                ['title' => 'Sửa Mã Giảm Giá', 'url' => route_to('Table_Promotions_Edit', $promotion['id'])],
            ],
        ]);
    }
    

    public function update($id)
    {
        $promotionsModel = new PromotionsModel();
        $promotionTourModel = new \App\Models\PromotionTourModel(); // Đảm bảo mô hình này tồn tại và quản lý bảng promotion_tour
    
        // Lấy dữ liệu từ form
        $data = [
            'discount_code' => $this->request->getPost('discount_code'),
            'discount_value' => $this->request->getPost('discount_value'),
            'promotion_details' => $this->request->getPost('promotion_details'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'applies_to_all_tours' => $this->request->getPost('applies_to_all_tours') ? 1 : 0,
        ];
    
        // Cập nhật thông tin chính của mã giảm giá
        $promotionsModel->update($id, $data);
    
        // Xử lý tour khi áp dụng không phải tất cả
        if ($data['applies_to_all_tours'] == 0) {
            // Xóa các tour cũ (nếu có)
            $promotionTourModel->where('promotion_id', $id)->delete();
    
            // Lấy danh sách các tour mới từ form
            $tourIds = $this->request->getPost('tour_ids');
    
            // Lưu thông tin tour mới vào bảng promotion_tour
            if ($tourIds) {
                foreach ($tourIds as $tourId) {
                    $promotionTourModel->insert([
                        'promotion_id' => $id,
                        'tour_id' => $tourId,
                    ]);
                }
            }
        }
    
        return redirect()->route('Table_Promotions')->with('success', 'Mã giảm giá đã được cập nhật!');
    }
    

    public function delete($id)
    {
        $promotionsModel = new PromotionsModel();
        $promotionsModel->delete($id);

        return redirect()->route('Table_Promotions')->with('success', 'Mã giảm giá đã được xóa!');
    }
}
