<?php

namespace App\Controllers;
use App\Models\ToursModel;
use App\Models\ImagesModel;
use App\Models\ReviewsModel;
use App\Models\TransportsModel;
use App\Models\BookingModel;
use App\Models\NewsModel;
use App\Models\CommentModel;
use App\Models\CustomerModel;
class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
  
    public function index1(): string
{
    $tourModel = new ToursModel();
    $imageModel = new ImagesModel();
    $reviewModel = new ReviewsModel();
    $transportModel = new TransportsModel();
    $bookingModel = new BookingModel();
    $newsModel = new NewsModel();  // Model để lấy thông tin bản tin
    $commentModel = new CommentModel(); // Model để lấy thông tin bình luận
    $customerModel = new CustomerModel(); // Model để lấy thông tin khách hàng

    // Lấy danh sách tour được đặt nhiều nhất
    $mostBookedTours = $bookingModel
        ->select('tour_id, COUNT(tour_id) AS booking_count')
        ->groupBy('tour_id')
        ->orderBy('booking_count', 'DESC')
        ->limit(4)
        ->findAll();

    // Lấy thông tin chi tiết từng tour và ảnh liên quan
    $tours = [];
    foreach ($mostBookedTours as $booking) {
        $tour = $tourModel->find($booking['tour_id']);
        if ($tour) {
            $tour['image_url'] = $imageModel->where('tour_id', $booking['tour_id'])->first()['image_url'] ?? null;
            $tours[] = $tour;
        }
    }

    // Lấy danh sách 3 bình luận mới nhất cùng với thông tin bản tin
    $latestComments = $commentModel->orderBy('created_at', 'DESC')->limit(3)->findAll();
    $commentsWithNews = [];
    foreach ($latestComments as $comment) {
        // Lấy thông tin bản tin từ comment
        $news = $newsModel->find($comment['news_id']);
        if ($news) {
            // Lấy thông tin khách hàng từ customer_id
            $customer = $customerModel->find($comment['customer_id']);
            $commentsWithNews[] = [
                'comment' => $comment,
                'news' => $news,
                'news_image' => $news['image'],  // Lấy hình ảnh từ bản tin
                'customer_name' => $customer ? $customer['name'] : 'Unknown', // Lấy tên khách hàng hoặc 'Unknown' nếu không có
            ];
        }
    }

    // Lấy loại phương tiện lọc (nếu có)
    $transportType = $this->request->getGet('transport_type');

    // Nếu có loại phương tiện, lọc danh sách tour theo loại
    $filteredTours = [];
    if (!empty($transportType)) {
        $transportIds = $transportModel->where('type', $transportType)->findColumn('id');
        if ($transportIds) {
            $filteredTours = $tourModel->whereIn('transport_id', $transportIds)->findAll();
        }
    } else {
        $filteredTours = $tourModel->findAll(); // Hiển thị tất cả nếu không có lọc
    }

    return view('Home/index', [
        'tours' => $tours,
        'mostBookedTours' => $mostBookedTours,
        'filteredTours' => $filteredTours,
        'transportType' => $transportType,
        'commentsWithNews' => $commentsWithNews, // Truyền danh sách bình luận kèm theo bản tin
    ]);
}

    

    public function index2(): string
    {
        return view('Home/about');
    }
    public function index3(): string
    {
        return view('Home/blog');
    }
    public function index4(): string
    {
        return view('Home/contact');
    }
    public function index5(): string
    {
        return view('Home/elements');
    }
    public function index6(): string
    {
        return view('Home/layout-home');
    }
    public function index7(): string
    {
        return view('Home/test');
    }
    public function index8(): string
    {
        return view('Home/booking');
    }
    public function index9(): string
    {
        return view('Home/single_listing');
    }
    public function table()
    {
        $data = [
            'pageTitle' => 'Home',  // Tiêu đề của trang
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Admin.Home')],
            ]
        ];
    
        // Trả về view table với dữ liệu breadcrumb và pageTitle
        return view('table', $data);
    }
    
    public function Errors(){
        return view('errors');
    }

    
    public function checkout(): string
    {
        return view('Home/config_order');
    }

    public function blogdetail():string{
        return view('Home/blogdetail');
    }

    public function search(): string
{
    $searchTerm = $this->request->getGet('search_term');
    $startDate = $this->request->getGet('start_date');
    $endDate = $this->request->getGet('end_date');

    if (!is_string($searchTerm) || empty($searchTerm)) {
        return redirect()->to(base_url('/tour/offers'))->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
    }

    $tourModel = new \App\Models\ToursModel();
    $imageModel = new \App\Models\ImagesModel();
    $reviewModel = new \App\Models\ReviewsModel();

    // Tìm kiếm với điều kiện từ khóa và ngày
    $query = $tourModel->groupStart()
                       ->like('name', $searchTerm)
                       ->orLike('description', $searchTerm)
                       ->groupEnd();

    if ($startDate && $endDate) {
        $query->groupStart()
              ->where('start_date <=', $endDate)
              ->where('end_date >=', $startDate)
              ->groupEnd();
    } elseif ($startDate) {
        $query->where('end_date >=', $startDate);
    } elseif ($endDate) {
        $query->where('start_date <=', $endDate);
    }

    $tours = $query->findAll();

    // Xử lý thông tin bổ sung
    foreach ($tours as &$tour) {
        $image = $imageModel->where('tour_id', $tour['id'])->first();
        $tour['image_url'] = $image ? base_url($image['image_url']) : '';
        $reviews = $reviewModel->where('tour_id', $tour['id'])->findAll();
        $tour['rating'] = $reviews ? array_sum(array_column($reviews, 'rating')) / count($reviews) : 0;
        $tour['review_count'] = count($reviews);
    }

    return view('Home/tour-offers', [
        'tours' => $tours,
        'searchTerm' => $searchTerm,
        'startDate' => $startDate,
        'endDate' => $endDate,
    ]);
}

}
 