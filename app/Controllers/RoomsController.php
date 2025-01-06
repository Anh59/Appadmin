<?php

namespace App\Controllers;

use App\Models\RoomsModel;
use CodeIgniter\Controller;
use App\Models\ToursModel;
class RoomsController extends Controller
{
    public function table()
    {
        $roomModel = new RoomsModel();
        $toursModel = new ToursModel();
    
        // Lấy thông tin phòng và tour liên quan
        $rooms = $roomModel->select('rooms.*, tours.name as tour_name')
                           ->join('tours', 'tours.id = rooms.tour_id', 'left') // Gán tour_name, nếu không có sẽ trả về null
                           ->findAll();
    
        $data = [
            'rooms' => $rooms,
            'pageTitle' => 'Danh Sách Phòng',
            'breadcrumb' => [
                ['title' => 'Thống kê', 'url' => route_to('Dashboard_table')],
                ['title' => 'Danh sách phòng', 'url' => route_to('Table_Rooms')],
            ]
        ];
    
        return view('Dashboard/Rooms/table', $data);
    }
    

    public function create()
    {
        $toursModel = new ToursModel();
        $tours = $toursModel->findAll();
    
        $data = [
            'tours' => $tours,
            'pageTitle' => 'Thêm Phòng Mới',
            'breadcrumb' => [
                ['title' => 'Thống kê', 'url' => route_to('Dashboard_table')],
                ['title' => 'Danh sách phòng', 'url' => route_to('Table_Rooms')],
            ]
        ];
    
        return view('Dashboard/Rooms/create', $data);
    }
    
    public function store()
    {
        $roomModel = new RoomsModel();
    
        $image = $this->request->getFile('image');
        $imagePath = null;
    
        if ($image && $image->isValid()) {
            if (!in_array($image->getMimeType(), ['image/jpeg', 'image/png'])) {
                return redirect()->back()->with('error', 'Tệp ảnh không hợp lệ! Chỉ chấp nhận định dạng JPEG hoặc PNG.');
            }
    
            // Tạo tên ngẫu nhiên và lưu vào thư mục public/uploads/rooms
            $newName = $image->getRandomName();
            $image->move(FCPATH . 'uploads/rooms', $newName);
    
            // Lưu đường dẫn tương đối vào cơ sở dữ liệu
            $imagePath = 'uploads/rooms/' . $newName;
        } else {
            return redirect()->back()->with('error', 'Tải ảnh lên thất bại!');
        }
    
        $roomData = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'available_quantity' => $this->request->getPost('available_quantity'),
            'tour_id' => $this->request->getPost('tour_id') ?: null,
            'image_url' => $imagePath,
        ];
    
        $roomModel->insert($roomData);
    
        return redirect()->route('Table_Rooms')->with('success', 'Thêm phòng thành công!');
    }
    
    
    
    public function edit($id)
    {
        $roomModel = new RoomsModel();
        $toursModel = new ToursModel();
    
        // Kiểm tra phòng có tồn tại hay không
        $room = $roomModel->find($id);
        if (!$room) {
            return redirect()->route('Table_Rooms')->with('error', 'Phòng không tồn tại!');
        }
    
        $tours = $toursModel->findAll();
    
        $data = [
            'room' => $room,
            'tours' => $tours,
            'pageTitle' => 'Chỉnh Sửa Phòng',
            'breadcrumb' => [
                ['title' => 'Thống kê', 'url' => route_to('Dashboard_table')],
                ['title' => 'Danh sách phòng', 'url' => route_to('Table_Rooms')],
            ]
        ];
    
        return view('Dashboard/Rooms/edit', $data);
    }
    
    
    public function update($id)
    {
        $roomModel = new RoomsModel();
    
        // Kiểm tra phòng có tồn tại hay không
        $room = $roomModel->find($id);
        if (!$room) {
            return redirect()->route('Table_Rooms')->with('error', 'Phòng không tồn tại!');
        }
    
        $image = $this->request->getFile('image');
        $imagePath = $room['image_url']; // Giữ nguyên ảnh cũ nếu không cập nhật ảnh mới
    
        if ($image && $image->isValid()) {
            if (!in_array($image->getMimeType(), ['image/jpeg', 'image/png'])) {
                return redirect()->back()->with('error', 'Tệp ảnh không hợp lệ! Chỉ chấp nhận định dạng JPEG hoặc PNG.');
            }
    
            // Tạo tên tệp ngẫu nhiên và lưu vào public/uploads/rooms
            $newName = $image->getRandomName();
            $image->move(FCPATH . 'uploads/rooms', $newName);
            $imagePath = 'uploads/rooms/' . $newName;
    
            // Xóa ảnh cũ nếu có
            if (!empty($room['image_url']) && file_exists(FCPATH . $room['image_url'])) {
                unlink(FCPATH . $room['image_url']);
            }
        }
    
        $roomData = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'available_quantity' => $this->request->getPost('available_quantity'),
            'tour_id' => $this->request->getPost('tour_id') ?: null,
            'image_url' => $imagePath,
        ];
    
        $roomModel->update($id, $roomData);
    
        return redirect()->route('Table_Rooms')->with('success', 'Cập nhật phòng thành công!');
    }
    
    

    public function details($id)
    {
        $roomModel = new RoomsModel();
        $room = $roomModel->find($id);

        if (!$room) {
            return redirect()->to(route_to('Table_Rooms'))->with('error', 'Phòng không tồn tại.');
        }

        $data = [
            'room' => $room,
            'pageTitle' => 'Chi Tiết Phòng',
            'breadcrumb' => [
                ['title' => 'Thống kê', 'url' => route_to('Dashboard_table')],
                ['title' => 'Rooms', 'url' => route_to('Table_Rooms')],
                ['title' => 'Chi Tiết Phòng', 'url' => route_to('Table_Rooms_Details', $id)],
            ]
        ];

        return view('Dashboard/Rooms/details', $data);
    }


    public function delete($id)
{
    $roomModel = new RoomsModel();

    // Kiểm tra phòng có tồn tại hay không
    $room = $roomModel->find($id);
    if (!$room) {
        return redirect()->route('Table_Rooms')->with('error', 'Phòng không tồn tại!');
    }

    // Tiến hành xóa phòng
    $roomModel->delete($id);

    // Nếu có ảnh, bạn có thể xóa file ảnh khỏi thư mục (nếu cần)
    if (!empty($room['image_url']) && file_exists(WRITEPATH . $room['image_url'])) {
        unlink(WRITEPATH . $room['image_url']);
    }

    return redirect()->route('Table_Rooms')->with('success', 'Xóa phòng thành công!');
}

    // Các phương thức store, edit, update, delete được triển khai tương tự như ToursController
}
