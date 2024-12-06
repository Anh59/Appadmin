<?php

namespace App\Controllers;

use App\Models\ConsultationModel;
use CodeIgniter\Controller;
use App\Models\ReplyModel;
use App\Models\UserModel;
class ConsultationController extends Controller
{
    public function submitConsultation()
    {
        // Load model
        $model = new ConsultationModel();
        
        // Lấy dữ liệu từ form
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
        ];

        // Lưu dữ liệu vào cơ sở dữ liệu
        if ($model->save($data)) {
            return redirect()->to('/contact')->with('success', 'Tư vấn đã được gửi thành công!');
        } else {
            return redirect()->to('/contact')->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
        }
    }

    public function table()
    {
        $consultationModel = new ConsultationModel();

        // Lấy tất cả dữ liệu tư vấn
        $consultations = $consultationModel->findAll();

        $data = [
            'consultations' => $consultations,
            'pageTitle' => 'Danh Sách Tư Vấn',
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                ['title' => 'Consultations', 'url' => route_to('Table_Consultations')],
            ]
        ];

        return view('Dashboard/Consultations/table', $data);
    }

    public function reply($id)
    {
        $consultationModel = new ConsultationModel();
        $replyModel = new ReplyModel(); // Mô hình mới cho bảng replies
        $userModel = new UserModel(); // Mô hình cho bảng users
    
        // Lấy tư vấn với id cụ thể
        $consultation = $consultationModel->find($id);
    
        // Kiểm tra nếu không tìm thấy tư vấn
        if (!$consultation) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tư vấn không tồn tại.');
        }
    
        // Lấy tất cả các phản hồi của tư vấn này
        $replies = $replyModel->where('consultation_id', $id)->findAll();
    
        // Duyệt qua các phản hồi và lấy thông tin người dùng từ user_id
        foreach ($replies as &$reply) {
            $user = $userModel->find($reply['user_id']); // Lấy thông tin người dùng từ user_id
            if ($user) {
                $reply['username'] = $user['username']; // Thêm username vào mảng reply
            } else {
                $reply['username'] = 'Unknown'; // Nếu không tìm thấy người dùng, gán 'Unknown'
            }
        }
    
        // Dữ liệu truyền vào view
        $data = [
            'consultation' => $consultation,
            'replies' => $replies,
            'pageTitle' => 'Trả Lời Khách Hàng',
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Dashboard_table')],
                ['title' => 'Consultations', 'url' => route_to('Table_Consultations')],
                ['title' => 'Reply', 'url' => current_url()],
            ]
        ];
    
        // Trả về view với dữ liệu đã chuẩn bị
        return view('Dashboard/Consultations/reply', $data);
    }
    
    
    
    
    

    // Xử lý phản hồi và gửi email
    public function sendReply($id)
    {
        $consultationModel = new ConsultationModel();
        $replyModel = new ReplyModel(); // Mô hình mới cho bảng replies
        
        // Tìm tư vấn theo id
        $consultation = $consultationModel->find($id);
        
        if (!$consultation) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tư vấn không tồn tại.');
        }
        
        // Kiểm tra session để lấy thông tin người dùng
        $user = session()->get('user'); // Lấy toàn bộ thông tin user từ session
        if (!$user || !$user['logged_in']) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để gửi phản hồi.');
        }
        
        // Lấy user_id từ session
        $userId = $user['user_id']; // Lấy user_id từ session
        
        // Lấy dữ liệu từ form
        $replyMessage = $this->request->getPost('reply_message');
        $subject = $this->request->getPost('subject'); // Tiêu đề email
        
        // Cấu hình email
        $email = \Config\Services::email();
        $email->setTo($consultation['email']);
        $email->setSubject($subject); // Gửi tiêu đề email
        $email->setMessage($replyMessage);
        
        // Gửi email và kiểm tra kết quả
        if ($email->send()) {
            // Lưu phản hồi vào bảng replies
            $replyModel->save([
                'consultation_id' => $id,
                'user_id' => $userId, // Sử dụng user_id từ session
                'reply_message' => $replyMessage,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        
            return redirect()->route('Table_Consultations')->with('success', 'Phản hồi đã được gửi!');
        } else {
            // Lấy thông tin lỗi nếu gửi thất bại
            return redirect()->back()->with('error', 'Gửi phản hồi thất bại. Vui lòng thử lại.');
        }
    }
    
    
    
    
    public function delete($id)
    {
        $model = new ConsultationModel();
        $model->delete($id);
        
        return redirect()->to('Dashboard/Consultations/table')->with('success', 'Tư vấn đã được xóa.');
    }


}
