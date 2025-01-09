<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ToursModel;
use App\Models\ImagesModel;
use App\Models\ReviewsModel;
use App\Models\RoomsModel;
class SingleController extends BaseController
{
    public function index(): string
    {
        $tourModel = new \App\Models\ToursModel();
        $imageModel = new \App\Models\ImagesModel();
        $reviewModel = new \App\Models\ReviewsModel();
        $transportModel = new \App\Models\TransportsModel();
    
        // Lấy thông tin lọc từ request
        $transportType = $this->request->getGet('transport_type');
    
        // Lấy danh sách ID phương tiện theo loại
        $tours = [];
        if (!empty($transportType)) {
            $transportIds = $transportModel->where('type', $transportType)->findColumn('id');
    
            if ($transportIds) {
                // Tìm tour có transport_id phù hợp
                $tours = $tourModel->whereIn('transport_id', $transportIds)->findAll();
            }
        } else {
            $tours = $tourModel->findAll(); // Lấy tất cả tour nếu không có bộ lọc
        }
    
        // Xử lý logic phân trang
        $currentPage = $this->request->getGet('page') ?? 1;
        $toursPerPage = 4;
        $totalTours = count($tours);
        $totalPages = ceil($totalTours / $toursPerPage);
        $offset = ($currentPage - 1) * $toursPerPage;
        $tours = array_slice($tours, $offset, $toursPerPage);
    
        // Lấy thêm thông tin cho từng tour (hình ảnh và đánh giá)
        if (!empty($tours)) {
            foreach ($tours as &$tour) {
                $image = $imageModel->where('tour_id', $tour['id'])->first();
                $tour['image_url'] = $image ? base_url($image['image_url']) : '';
    
                $reviews = $reviewModel->where('tour_id', $tour['id'])->findAll();
                if (!empty($reviews)) {
                    $tour['rating'] = array_sum(array_column($reviews, 'rating')) / count($reviews);
                    $tour['review_count'] = count($reviews);
                    $tour['review_title'] = 'Rất tốt';
                } else {
                    $tour['rating'] = 0;
                    $tour['review_count'] = 0;
                    $tour['review_title'] = 'Chưa có đánh giá';
                }
            }
        }
    
        // Truyền dữ liệu sang view
        return view('Home/tour-offers', [
            'tours' => $tours,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
            'transportType' => $transportType,
        ]);
    }
    

    // Trang chi tiết từng tour
public function single_listing($id): string
{
    $tourModel = new \App\Models\ToursModel();
    $imageModel = new \App\Models\ImagesModel();
    $reviewModel = new \App\Models\ReviewsModel();
    $roomModel = new \App\Models\RoomsModel(); // Model để lấy thông tin phòng
    $customerModel = new \App\Models\CustomerModel(); // Model để lấy thông tin khách hàng

    // Lấy thông tin tour theo ID
    $tour = $tourModel->find($id);

    if ($tour) {
        // Lấy tất cả hình ảnh liên quan đến tour
        $images = $imageModel->where('tour_id', $tour['id'])->findAll();
        if (!empty($images)) {
            $tour['image_url'] = base_url($images[0]['image_url']);
            $tour['gallery_images'] = array_slice($images, 1);
        } else {
            $tour['image_url'] = ''; // Có thể thêm ảnh mặc định nếu cần
            $tour['gallery_images'] = [];
        }

        // Lấy đánh giá cho tour
        $reviews = $reviewModel->where('tour_id', $tour['id'])->findAll();
        if (!empty($reviews)) {
            $tour['rating'] = array_sum(array_column($reviews, 'rating')) / count($reviews);
            $tour['review_count'] = count($reviews);
            $tour['review_title'] = 'Very good';

            // Lấy thêm thông tin khách hàng từ bảng `customers`
            foreach ($reviews as &$review) {
                $customer = $customerModel->find($review['customer_id']);
                if ($customer) {
                    $review['reviewer_name'] = $customer['name']; // Gán tên khách hàng
                    $review['reviewer_image'] = $customer['image_url']; // Gán hình ảnh khách hàng từ cột image_url
                } else {
                    $review['reviewer_name'] = 'Unknown'; // Nếu không tìm thấy khách hàng
                    $review['reviewer_image'] = ''; // Hình ảnh mặc định nếu không có
                }
            }
        } else {
            $tour['rating'] = 0;
            $tour['review_count'] = 0;
            $tour['review_title'] = 'No reviews yet';
        }

        // Lấy thông tin phòng cho tour
        $rooms = $roomModel->where('tour_id', $tour['id'])->findAll();
        $tour['rooms'] = $rooms; // Truyền dữ liệu phòng vào tour
    }

    // Truyền dữ liệu tour vào view chi tiết
    return view('Home/single_listing', [
        'tour' => $tour,
        'reviews' => $reviews // Truyền $reviews vào view
    ]);
}

// Search function in the controller
public function search(): string
{
    $searchTerm = $this->request->getGet('search_term');
    $transportType = $this->request->getGet('transport_type'); // Lấy giá trị transport_type nếu có

    // Kiểm tra xem $searchTerm có phải là chuỗi hợp lệ hay không
    if (!is_string($searchTerm) || empty($searchTerm)) {
        // Nếu không có từ khóa tìm kiếm hợp lệ, trả về danh sách tour bình thường
        return redirect()->to(base_url('/tour/offers'));
    }

    $tourModel = new \App\Models\ToursModel();
    $imageModel = new \App\Models\ImagesModel();
    $reviewModel = new \App\Models\ReviewsModel();
    $transportModel = new \App\Models\TransportsModel();

    // Tìm các tour có tên hoặc mô tả phù hợp với từ khóa tìm kiếm
    $tours = $tourModel->like('name', $searchTerm)
                       ->orLike('description', $searchTerm)
                       ->findAll();

    // Xử lý phân trang
    $currentPage = $this->request->getGet('page') ?? 1;
    $toursPerPage = 4;
    $totalTours = count($tours);
    $totalPages = ceil($totalTours / $toursPerPage);
    $offset = ($currentPage - 1) * $toursPerPage;
    $tours = array_slice($tours, $offset, $toursPerPage);

    // Lấy thêm thông tin cho từng tour (hình ảnh và đánh giá)
    if (!empty($tours)) {
        foreach ($tours as &$tour) {
            $image = $imageModel->where('tour_id', $tour['id'])->first();
            $tour['image_url'] = $image ? base_url($image['image_url']) : '';

            $reviews = $reviewModel->where('tour_id', $tour['id'])->findAll();
            if (!empty($reviews)) {
                $tour['rating'] = array_sum(array_column($reviews, 'rating')) / count($reviews);
                $tour['review_count'] = count($reviews);
                $tour['review_title'] = 'Very good';
            } else {
                $tour['rating'] = 0;
                $tour['review_count'] = 0;
                $tour['review_title'] = 'No reviews yet';
            }
        }
    }

    // Truyền dữ liệu sang view
    return view('Home/tour-offers', [
        'tours' => $tours,
        'totalPages' => $totalPages,
        'currentPage' => $currentPage,
        'searchTerm' => $searchTerm,
        'transportType' => $transportType, // Truyền transportType vào view
    ]);
}



    


    
}   
