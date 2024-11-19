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
    
        return view('Dashboard/Tours/table', ['tours' => $tours]);
    }
    

    public function details($id)
    {
        $tourModel = new ToursModel();
        $imageModel = new ImagesModel();
        $roomModel = new RoomsModel();
        $transportModel = new TransportsModel();
    
        // Lấy thông tin tour
        $tour = $tourModel->find($id);
    
        // Lấy hình ảnh liên quan (giả sử bảng images có cột tour_id)
        $images = $imageModel->where('tour_id', $id)->findAll();
    
        // Lấy thông tin phòng liên quan (giả sử bảng rooms có cột tour_id)
        $rooms = $roomModel->where('tour_id', $id)->findAll();
    
        // Lấy thông tin phương tiện liên quan (sử dụng transport_id từ bảng tours)
        $transport = $transportModel->find($tour['transport_id']);
    
        return view('Dashboard/Tours/details', [
            'tour' => $tour,
            'images' => $images,
            'rooms' => $rooms,
            'transport' => $transport
        ]);
    }
    
    

    public function create()
{
    $roomModel = new RoomsModel();
    $transportModel = new TransportsModel();    

    // Lấy tất cả các phòng và phương tiện hiện có
    $rooms = $roomModel->findAll();
    $transports = $transportModel->findAll();

    return view('Dashboard/Tours/create', [
        'rooms' => $rooms,
        'transports' => $transports
    ]);
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

    // Lưu thông tin tour
    $tourData = [
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
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

    // Lưu nhiều phòng (nếu có)
    $roomIds = $this->request->getPost('room_ids'); // Dữ liệu từ checkbox

    if (!empty($roomIds)) {
        // Kiểm tra và gán phòng vào tour
        foreach ($roomIds as $roomId) {
            $room = $roomModel->find($roomId);
            if ($room) {
                // Gán phòng vào tour mới mà không thay đổi số lượng (quantity) của phòng
                // Chỉ gán nếu phòng chưa có tour nào gán
                if ($room['tour_id'] === null) {
                    $roomModel->update($roomId, [
                        'tour_id' => $tourId,  // Gán tour vào phòng
                    ]);
                }
            }
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

    // Lấy tất cả các phòng và phương tiện hiện có
    $rooms = $roomModel->findAll();  // Lấy danh sách tất cả phòng
    $transports = $transportModel->findAll();

    // Lấy các hình ảnh liên quan đến tour từ bảng images
    $images = $imageModel->where('tour_id', $id)->findAll();

    // Lấy danh sách các phòng đã được chọn (liên kết với tour hiện tại)
    $selectedRooms = $roomModel->where('tour_id', $id)->findAll();
    $selectedRoomIds = array_column($selectedRooms, 'id');  // Lấy danh sách ID của các phòng đã được chọn

    return view('Dashboard/Tours/edit', [
        'tour' => $tour,
        'rooms' => $rooms,  // Truyền danh sách phòng vào view
        'transports' => $transports,
        'images' => $images,  // Truyền hình ảnh vào view
        'selectedRoomIds' => $selectedRoomIds  // Truyền danh sách phòng đã chọn vào view
    ]);
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

    // Cập nhật hình ảnh
    $images = $this->request->getFiles('image_url');
    if (!empty($images['image_url'])) {
        foreach ($images['image_url'] as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = str_replace(' ', '_', $image->getName());
                $image->move(FCPATH . 'uploads', $imageName);
                $imageData = [
                    'tour_id' => $id,
                    'image_url' => 'uploads/' . $image->getName(),
                ];
                $imageModel->insert($imageData);
            }
        }
    }

    // Xóa các hình ảnh đã được chọn xóa trong form
    $deleteImages = $this->request->getPost('delete_images');
    if (!empty($deleteImages)) {
        foreach ($deleteImages as $imageId) {
            // Xóa hình ảnh khỏi cơ sở dữ liệu
            $image = $imageModel->find($imageId);
            if ($image) {
                // Xóa ảnh từ thư mục
                unlink(FCPATH . $image['image_url']);
                // Xóa ảnh trong cơ sở dữ liệu
                $imageModel->delete($imageId);
            }
        }
    }

    // Cập nhật phòng đã chọn và xử lý mối quan hệ khóa ngoại
    $roomIds = $this->request->getPost('room_ids');
    if (!empty($roomIds)) {
        // Đầu tiên, gỡ bỏ các phòng không còn được chọn
        $roomModel->whereNotIn('id', $roomIds)
                  ->where('tour_id', $id)
                  ->set(['tour_id' => null]) // Gỡ phòng khỏi tour cũ
                  ->update();

        // Cập nhật lại các phòng còn lại
        foreach ($roomIds as $roomId) {
            $room = $roomModel->find($roomId);
            if ($room) {
                // Nếu phòng còn số lượng, gán lại tour_id
                if ($room['quantity'] > 0) {
                    $roomModel->update($roomId, ['tour_id' => $id]);
                } else {
                    return redirect()->back()->with('error', "Phòng {$room['name']} không còn phòng.");
                }
            }
        }
    } else {
        // Nếu không có phòng nào được chọn, gỡ phòng khỏi tour
        $roomModel->where('tour_id', $id)->set(['tour_id' => null])->update();
    }

    return redirect()->route('Table_Tours');
}





    public function delete($id)
    {
        $tourModel = new ToursModel();
        $tourModel->delete($id);

        return redirect()->route('Table_Tours');
    }
    
}
