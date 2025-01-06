<?php

namespace App\Controllers;

use App\Models\ToursModel;
use App\Models\ImagesModel;
use App\Models\RoomsModel;
use App\Models\TransportsModel;
use CodeIgniter\Controller;

class ToursController extends Controller
{
    public function table()
    {
        $tourModel = new ToursModel();
        $tours = $tourModel->select('tours.*, images.image_url')
                           ->join('images', 'images.tour_id = tours.id', 'left')
                           ->groupBy('tours.id') // Đảm bảo chỉ lấy một hình ảnh cho mỗi tour
                           ->findAll();
        

                           $data = [
                            'tours' => $tours,
                            'pageTitle' => 'Chuyến Du Lịch',  // Tiêu đề trang
                            'breadcrumb' => [
                                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                                ['title' => 'Tours', 'url' => route_to('Table_Tours')],
                            ]
                        ];                 
                        return view('Dashboard/Tours/table', $data);
    }
    

    public function details($id)
    {
        $tourModel = new ToursModel();
        $imageModel = new ImagesModel();
        $roomModel = new RoomsModel();
        $transportModel = new TransportsModel();
        
        // Lấy thông tin tour
        $tour = $tourModel->find($id);
        
        // Kiểm tra nếu tour không tồn tại
        if (!$tour) {
            // Nếu không tìm thấy tour, bạn có thể redirect hoặc báo lỗi
            return redirect()->to(route_to('Admin.Tours'))->with('error', 'Tour not found');
        }
        
        // Lấy hình ảnh liên quan (giả sử bảng images có cột tour_id)
        $images = $imageModel->where('tour_id', $id)->findAll();
        
        // Lấy thông tin phòng liên quan (giả sử bảng rooms có cột tour_id)
        $rooms = $roomModel->where('tour_id', $id)->findAll();
        
        // Lấy thông tin phương tiện liên quan (sử dụng transport_id từ bảng tours)
        $transport = $transportModel->find($tour['transport_id']);
        
        // Đặt tiêu đề trang và breadcrumb
        $data = [
            'tour' => $tour,
            'images' => $images,
            'rooms' => $rooms,
            'transport' => $transport,
            'pageTitle' => 'Tour Detail - ' . $tour['name'],  // Tiêu đề trang chi tiết
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                ['title' => 'Tours', 'url' => route_to('Table_Tours')],
                ['title' => 'Tour Detail', 'url' => route_to('Table_Tours_Details', $id)],
            ]
        ];
    
        // Trả về view với dữ liệu đầy đủ
        return view('Dashboard/Tours/details', $data);
    }
    
    
    

    public function create()
    {
        $roomModel = new RoomsModel();
        $transportModel = new TransportsModel();
    
        // Lấy tất cả các phòng và phương tiện hiện có
        $rooms = $roomModel->findAll();
        $transports = $transportModel->findAll();
    
        // Dữ liệu truyền vào view
        $data = [
            'rooms' => $rooms,
            'transports' => $transports,
            'pageTitle' => 'Tạo Mới Tour',  // Tiêu đề trang
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                ['title' => 'Tours', 'url' => route_to('Table_Tours')],
                ['title' => 'Tạo Mới Tour', 'url' => route_to('Table_Tours_Create')]
            ]
        ];
    
        // Trả về view tạo tour với dữ liệu breadcrumb và tiêu đề
        return view('Dashboard/Tours/create', $data);
    }
    


    public function store()
    {
        $tourModel = new ToursModel();
        $imageModel = new ImagesModel();
        $roomModel = new RoomsModel();
        $transportModel = new TransportsModel();
    
        // Lấy transport_id từ form
        $transportId = $this->request->getPost('transport_id');
    
        // Kiểm tra xem transport_id có hợp lệ không (có giá trị và tồn tại trong bảng transports)
        if (!$transportId || !$transportModel->find($transportId)) {
            return redirect()->back()->with('error', 'Phương tiện không hợp lệ.');
        }
    
        // Lưu nhiều phòng (nếu có)
        $roomIds = $this->request->getPost('room_ids'); // Dữ liệu từ checkbox
    
        // Kiểm tra nếu không có phòng nào được chọn
        if (empty($roomIds)) {
            return redirect()->back()->with('error', 'Không thể tạo tour nếu chưa có phòng được chọn.');
        }
    
        // Lấy nội dung mô tả từ Quill và loại bỏ các thẻ HTML không cần thiết
        $description = $this->request->getPost('description');
        // Loại bỏ các thẻ HTML không cần thiết, ví dụ chỉ lấy text thuần (nếu cần)
        $description = strip_tags($description);  // Sử dụng strip_tags để loại bỏ tất cả các thẻ HTML
    
        // Lưu thông tin tour
        $tourData = [
            'name' => $this->request->getPost('name'),
            'description' => $description,  // Lưu nội dung mô tả đã xử lý
            'price_per_person' => $this->request->getPost('price_per_person'),
            'transport_id' => $transportId,  // Lưu transport_id vào bảng tours
        ];
        $tourId = $tourModel->insert($tourData);
    
        // Lưu hình ảnh
        $images = $this->request->getFiles('image_url');  // Lấy mảng các tệp ảnh
    
        // Kiểm tra nếu ảnh đã được upload
        if (!empty($images['image_url'])) {
            foreach ($images['image_url'] as $image) {
                // Kiểm tra nếu tệp hợp lệ (trong trường hợp này $image là đối tượng UploadedFile)
                if ($image->isValid() && !$image->hasMoved()) {
                    // Di chuyển tệp vào thư mục lưu trữ
                    $imageName = str_replace(' ', '_', $image->getName()); // Thay thế dấu cách bằng dấu gạch dưới hoặc bạn có thể dùng urlencode()
                    $image->move(FCPATH . 'uploads', $imageName);
    
                    // Lưu thông tin ảnh vào bảng images
                    $imageData = [
                        'tour_id' => $tourId,
                        'image_url' => 'uploads/' . $image->getName(), // Đường dẫn tệp đã lưu
                    ];
                    $imageModel->insert($imageData);
                }
            }
        }
    
        // Gán phòng vào tour
        foreach ($roomIds as $roomId) {
            $room = $roomModel->find($roomId);
            if ($room && $room['tour_id'] === null) {  // Chỉ gán nếu phòng chưa có tour nào gán
                $roomModel->update($roomId, [
                    'tour_id' => $tourId,  // Gán tour vào phòng
                ]);
            }
        }
    
        return redirect()->route('Table_Tours');
    }
    




public function edit($id)
{
    $tourModel = new ToursModel();
    $roomModel = new RoomsModel();
    $transportModel = new TransportsModel();
    $imageModel = new ImagesModel();  // Thêm model cho hình ảnh

    // Lấy thông tin tour từ cơ sở dữ liệu
    $tour = $tourModel->find($id);
    if (!$tour) {
        return redirect()->route('Table_Tours')->with('error', 'Tour không tồn tại.');
    }

    // Lấy các phòng chưa có tour nào hoặc đã được gán cho tour hiện tại
    $rooms = $roomModel->where('tour_id', null)
                       ->orWhere('tour_id', $id)
                       ->findAll();

    // Lấy tất cả phương tiện
    $transports = $transportModel->findAll();

    // Lấy các hình ảnh liên quan đến tour từ bảng images
    $images = $imageModel->where('tour_id', $id)->findAll();

    // Lấy danh sách các phòng đã được chọn (liên kết với tour hiện tại)
    $selectedRooms = $roomModel->where('tour_id', $id)->findAll();
    $selectedRoomIds = array_column($selectedRooms, 'id');  // Lấy danh sách ID của các phòng đã được chọn

    // Dữ liệu truyền vào view
    $data = [
        'tour' => $tour,
        'rooms' => $rooms,  // Truyền danh sách phòng vào view
        'transports' => $transports,
        'images' => $images,  // Truyền hình ảnh vào view
        'selectedRoomIds' => $selectedRoomIds,  // Truyền danh sách phòng đã chọn vào view
        'pageTitle' => 'Chỉnh Sửa Tour',  // Tiêu đề trang
        'breadcrumb' => [
            ['title' => 'Home', 'url' => route_to('Dashboard_table')],
            ['title' => 'Tours', 'url' => route_to('Table_Tours')],
            ['title' => 'Chỉnh Sửa Tour', 'url' => route_to('Table_Tours_Edit', $id)]  // Cập nhật breadcrumb cho trang chỉnh sửa
        ]
    ];

    return view('Dashboard/Tours/edit', $data);
}


public function update($id)
{
    $tourModel = new ToursModel();
    $imageModel = new ImagesModel();
    $roomModel = new RoomsModel();
    $transportModel = new TransportsModel();

    // Lấy transport_id từ form
    $transportId = $this->request->getPost('transport_id');

    // Kiểm tra xem transport_id có hợp lệ không
    if (!$transportId || !$transportModel->find($transportId)) {
        return redirect()->back()->with('error', 'Phương tiện không hợp lệ.');
    }

    // Cập nhật thông tin tour
    $tourData = [
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
        'price_per_person' => $this->request->getPost('price_per_person'),
        'transport_id' => $transportId,
    ];
    $tourModel->update($id, $tourData);

    // Lấy các hình ảnh đã được chọn để xóa
    $deleteImages = $this->request->getPost('delete_images') ?: [];

    // Xóa hình ảnh đã chọn trong form
    if (!empty($deleteImages)) {
        foreach ($deleteImages as $imageId) {
            $image = $imageModel->find($imageId);
            if ($image) {
                // Xóa ảnh từ thư mục
                if (file_exists(FCPATH . $image['image_url'])) {
                    unlink(FCPATH . $image['image_url']);
                }
                // Xóa ảnh trong cơ sở dữ liệu
                $imageModel->delete($imageId);
            }
        }
    }

    // Lấy danh sách ảnh mới tải lên
    $uploadedImages = [];
    if ($this->request->getFiles('image_url')) {
        $images = $this->request->getFileMultiple('image_url');
        foreach ($images as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = str_replace(' ', '_', $image->getName());
                $image->move(FCPATH . 'uploads', $imageName);
                $uploadedImages[] = [
                    'tour_id' => $id,
                    'image_url' => 'uploads/' . $imageName,
                ];
            }
        }
    }

    // Thêm ảnh mới vào cơ sở dữ liệu nếu có
    if (!empty($uploadedImages)) {
        $imageModel->insertBatch($uploadedImages);
    }

    // Lấy danh sách phòng đã chọn từ form
    $roomIds = $this->request->getPost('room_ids');

    if (empty($roomIds)) {
        return redirect()->back()->with('error', 'Bạn phải chọn ít nhất một phòng cho tour.');
    }

    // Gỡ bỏ các phòng không còn được chọn
    $roomModel->whereNotIn('id', $roomIds)
              ->where('tour_id', $id)
              ->set(['tour_id' => null]) // Gỡ phòng khỏi tour cũ
              ->update();

    // Cập nhật lại các phòng đã chọn
    foreach ($roomIds as $roomId) {
        $room = $roomModel->find($roomId);
        if ($room) {
            // Gán lại tour_id cho các phòng đã chọn
            $roomModel->update($roomId, ['tour_id' => $id]);
        }
    }

    return redirect()->route('Table_Tours')->with('success', 'Cập nhật tour thành công!');
}


public function delete($id)
{
    $tourModel = new ToursModel();
    $roomModel = new RoomsModel();
    $imageModel = new ImagesModel();

    // Kiểm tra tour có tồn tại không
    $tour = $tourModel->find($id);
    if (!$tour) {
        return redirect()->route('Table_Tours')->with('error', 'Tour không tồn tại.');
    }

    // Cập nhật các phòng thuộc tour này thành phòng trống (tour_id = null)
    $roomModel->where('tour_id', $id)->set(['tour_id' => null])->update();

    // Xóa các hình ảnh liên quan đến tour này
    $images = $imageModel->where('tour_id', $id)->findAll();
    if (!empty($images)) {
        foreach ($images as $image) {
            if (file_exists(FCPATH . $image['image_url'])) {
                unlink(FCPATH . $image['image_url']); // Xóa file ảnh
            }
            $imageModel->delete($image['id']); // Xóa bản ghi trong database
        }
    }

    // Xóa tour khỏi database
    $tourModel->delete($id);

    return redirect()->route('Table_Tours')->with('success', 'Xóa tour thành công!');
}

    
}
