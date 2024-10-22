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
        $tours = $tourModel->findAll();

        return view('Dashboard/Tours/table', ['tours' => $tours]);
    }

    public function create()
    {
        return view('Dashboard/Tours/create');
    }

    public function store()
    {
        $tourModel = new ToursModel();
        $imageModel = new ImagesModel();
        $roomModel = new RoomsModel();
        $transportModel = new TransportsModel();

        // Lưu thông tin tour
        $tourData = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];
        $tourId = $tourModel->insert($tourData);

        // Lưu hình ảnh
        $imageData = [
            'tour_id' => $tourId,
            'image_url' => $this->request->getPost('image_url'),
        ];
        $imageModel->insert($imageData);

        // Lưu phương tiện
        $transportData = [
            'tour_id' => $tourId,
            'transport_type' => $this->request->getPost('transport_type'),
        ];
        $transportModel->insert($transportData);

        // Lưu thông tin phòng
        $roomData = [
            'tour_id' => $tourId,
            'room_type' => $this->request->getPost('room_type'),
            'price_per_night' => $this->request->getPost('price_per_night'),
        ];
        $roomModel->insert($roomData);

        return redirect()->route('Table_Tours');
    }

    public function edit($id)
    {
        $tourModel = new ToursModel();
        $tour = $tourModel->find($id);

        return view('Dashboard/Tours/edit', ['tour' => $tour]);
    }

    public function update($id)
    {
        $tourModel = new ToursModel();

        // Cập nhật thông tin tour
        $tourData = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];
        $tourModel->update($id, $tourData);

        return redirect()->route('Table_Tours');
    }

    public function delete($id)
    {
        $tourModel = new ToursModel();
        $tourModel->delete($id);

        return redirect()->route('Table_Tours');
    }
}
