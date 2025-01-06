<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;
use App\Models\CommentModel;
class NewsController extends Controller
{
    public function table()
    {
        $newsModel = new NewsModel();
    
        // Lấy danh sách bài viết cùng số lượng bình luận
        $news = $newsModel
            ->select('news.*, COUNT(comments.id) as comments_count')
            ->join('comments', 'comments.news_id = news.id', 'left')
            ->groupBy('news.id')
            ->findAll();
    
        $data = [
            'news' => $news,
            'pageTitle' => 'Danh Sách Bài Viết',
            'breadcrumb' => [
                ['title' => 'Thống kê', 'url' => route_to('Dashboard_table')],
                ['title' => 'Bài Viết', 'url' => route_to('Table_News')],
            ]
        ];
    
        return view('Dashboard/News/table', $data);
    }
    

    public function create()
    {
        return view('Dashboard/News/create', [
            'pageTitle' => 'Thêm Bài Viết',
            'breadcrumb' => [
                ['title' => 'Thống kê', 'url' => route_to('Dashboard_table')],
                ['title' => 'Bài Viết', 'url' => route_to('Table_News')],
                ['title' => 'Thêm Bài Viết', 'url' => route_to('Table_News_Create')],
            ],
        ]);
    }

    public function store()
    {
        $newsModel = new NewsModel();
    
        // Lấy dữ liệu từ form
        $data = [
            'title'     => $this->request->getPost('title'),
            'content'   => $this->request->getPost('content'),
            'category'  => $this->request->getPost('category'),
            'author_id' => $this->request->getPost('author_id'),
        ];
    
        // Xử lý hình ảnh
        $image = $this->request->getFile('image');
        $imagePath = null;
    
        if ($image && $image->isValid()) {
            // Kiểm tra định dạng ảnh
            if (!in_array($image->getMimeType(), ['image/jpeg', 'image/png'])) {
                return redirect()->back()->with('error', 'Tệp ảnh không hợp lệ! Chỉ chấp nhận định dạng JPEG hoặc PNG.');
            }
    
            // Tạo tên ngẫu nhiên và lưu vào thư mục public/uploads/news
            $newName = $image->getRandomName();
            $image->move(FCPATH . 'uploads/news', $newName);
    
            // Lưu đường dẫn tương đối vào cơ sở dữ liệu
            $imagePath = 'uploads/news/' . $newName;
        } else {
            return redirect()->back()->with('error', 'Tải ảnh lên thất bại!');
        }
    
        // Gán đường dẫn ảnh vào dữ liệu bài viết
        $data['image'] = $imagePath;
    
        // Thêm bài viết vào cơ sở dữ liệu
        $newsModel->insert($data);
    
        return redirect()->route('Table_News')->with('success', 'Bài viết đã được thêm!');
    }
    


    public function edit($id)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->find($id);

        if (!$news) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Bài viết không tồn tại.');
        }

        return view('Dashboard/News/edit', [
            'news' => $news,
            'pageTitle' => 'Sửa Bài Viết',
            'breadcrumb' => [
                ['title' => 'Thống kê', 'url' => route_to('Dashboard_table')],
                ['title' => 'Bài Viết', 'url' => route_to('Table_News')],
                ['title' => 'Sửa Bài Viết', 'url' => route_to('Table_News_Edit', $news['id'])],
            ],
        ]);
    }

    public function update($id)
{
    $newsModel = new NewsModel();
    $news = $newsModel->find($id);

    if (!$news) {
        return redirect()->route('Table_News')->with('error', 'Không tìm thấy bài viết!');
    }

    // Lấy dữ liệu từ form
    $data = [
        'title'     => $this->request->getPost('title'),
        'content'   => $this->request->getPost('content'),
        'category'  => $this->request->getPost('category'),
        'author_id' => $this->request->getPost('author_id'),
    ];

    // Xử lý hình ảnh
    $image = $this->request->getFile('image');
    if ($image && $image->isValid()) {
        if (!in_array($image->getMimeType(), ['image/jpeg', 'image/png'])) {
            return redirect()->back()->with('error', 'Tệp ảnh không hợp lệ! Chỉ chấp nhận JPEG hoặc PNG.');
        }

        // Lưu ảnh mới
        $newName = $image->getRandomName();
        $image->move(FCPATH . 'uploads/news', $newName);
        $data['image'] = 'uploads/news/' . $newName;

        // Xóa ảnh cũ (nếu có)
        if (!empty($news['image']) && file_exists(FCPATH . $news['image'])) {
            unlink(FCPATH . $news['image']);
        }
    }

    // Cập nhật bài viết
    $newsModel->update($id, $data);

    return redirect()->route('Table_News')->with('success', 'Bài viết đã được cập nhật!');
}

    

    public function delete($id)
    {
        $newsModel = new NewsModel();
        $newsModel->delete($id);

        return redirect()->route('Table_News')->with('success', 'Bài viết đã được xóa!');
    }   

    public function detail($id)
    {
        $newsModel = new NewsModel();
        $commentsModel = new \App\Models\CommentModel();
    
        // Lấy thông tin bài viết
        $news = $newsModel->find($id);
    
        if (!$news) {
            return redirect()->route('Table_News')->with('error', 'Không tìm thấy bài viết!');
        }
    
        // Lấy danh sách bình luận liên quan đến bài viết
        $comments = $commentsModel
            ->select('comments.title, comments.comment as content, comments.created_at, customers.name as user_name')
            ->join('customers', 'customers.id = comments.customer_id')
            ->where('comments.news_id', $id)
            ->findAll();
    
        return view('Dashboard/News/details', [
            'news' => $news,
            'comments' => $comments,
            'pageTitle' => 'Chi Tiết Bài Viết',  // Thêm tiêu đề trang
            'breadcrumb' => [
                ['title' => 'Thống kê', 'url' => route_to('Dashboard_table')],  // Đường dẫn về trang chủ
                ['title' => 'Bài Viết', 'url' => route_to('Table_News')],  // Đường dẫn đến danh sách bài viết
                ['title' => 'Chi Tiết Bài Viết', 'url' => route_to('Table_News_Detail', $id)],  // Đường dẫn đến trang chi tiết
            ],
        ]);
    }

    //view blog
    public function newsList()
{
    $newsModel = new \App\Models\NewsModel();
    $commentsModel = new \App\Models\CommentModel();

    // Define the number of items per page
    $perPage = 3; // You can adjust this based on your needs

    // Get the current page from the query string, default to page 1
    $currentPage = $this->request->getVar('page') ?? 1;

    // Fetch paginated news list with comments count
    $newsList = $newsModel
        ->select('news.id, news.title, news.content, news.image, news.category, news.created_at, news.author_id, COUNT(comments.id) as comments_count')
        ->join('comments', 'comments.news_id = news.id', 'left')
        ->groupBy('news.id')
        ->orderBy('news.created_at', 'DESC')
        ->paginate($perPage, 'default', $currentPage);

    // Get total pages to generate pagination controls
    $totalPages = $newsModel->pager->getPageCount();

    // Prepare data for the view
    $data = [
        'newsList' => $newsList,
        'pager' => $newsModel->pager,  // Provide pager for pagination controls
        'totalPages' => $totalPages    // Total pages to generate pagination
    ];

    return view('home/blog', $data);
}

public function blogDetail($id)
{
  
    $newsModel = new \App\Models\NewsModel();
    $commentsModel = new \App\Models\CommentModel();
    $customerModel = new \App\Models\CustomerModel();

    // Lấy chi tiết bài viết
   

        $news = $newsModel->where('id', $id)->first();
        if (!$news) {
            echo "No news found for ID: " . $id;
            return;
        }
        
    


    // Lấy danh sách bình luận và thông tin khách hàng
    $comments = $commentsModel
        ->select('comments.*, customers.name as user_name, customers.image_url as user_avatar')
        ->join('customers', 'customers.id = comments.customer_id', 'left')
        ->where('comments.news_id', $id)
        ->orderBy('comments.created_at', 'DESC')
        ->findAll();

    // Chuẩn bị dữ liệu cho view
    $data = [
        'news' => $news,
        'comments' => $comments
    ];

    return view('home/blogdetail', $data);
}


public function submitComment()
    {
        // Kiểm tra trạng thái đăng nhập
        if (!session('isLoggedIn')) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để gửi bình luận.');
        }

        // Lấy dữ liệu từ form
        $title = $this->request->getPost('title');
        $comment = $this->request->getPost('comment');
        $newsId = $this->request->getPost('news_id'); // Nếu bạn cần liên kết bình luận với bài viết

        // Kiểm tra dữ liệu hợp lệ
        if (!$title || !$comment) {
            return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin.');
        }

        // Lưu bình luận vào cơ sở dữ liệu
        $commentModel = new CommentModel();
        $commentModel->insert([
            'news_id' => $newsId,
            'customer_id' => session('customer_id'),
            'title' => $title,
            'comment' => $comment,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // Chuyển hướng sau khi lưu thành công
        return redirect()->back()->with('success', 'Bình luận đã được gửi.');
    }

}
