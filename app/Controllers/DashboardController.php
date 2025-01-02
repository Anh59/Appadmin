<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\BookingModel;
use App\Models\ToursModel;

class DashboardController extends BaseController
{
    public function table()
    {
        // Truy xuất dữ liệu từ model
        $customerModel = new CustomerModel();
        $bookingModel = new BookingModel();
        $toursModel = new ToursModel();
    
        // Tính toán số lượng khách hàng
        $totalCustomers = $customerModel->countAllResults();
    
        // Tính toán doanh thu hoàn thành
        $completedBookings = $bookingModel->where('payment_status', 'completed')->findAll();
        $totalRevenue = array_sum(array_column($completedBookings, 'total_price'));
    
        // Tính toán doanh thu hàng ngày
        $dailyRevenue = $bookingModel->select('DATE(payment_updated_at) as date, SUM(total_price) as total_revenue')
            ->where('payment_status', 'completed')
            ->groupBy('DATE(payment_updated_at)')
            ->findAll();
    
        // Tính toán trạng thái thanh toán
        $paymentStatusData = $bookingModel->select('payment_status, COUNT(*) as count')
            ->groupBy('payment_status')
            ->findAll();
    
        // Lấy dữ liệu doanh thu theo tháng
        $month = $this->request->getGet('month') ?? date('Y-m'); // Mặc định là tháng hiện tại
        $monthlyRevenue = $bookingModel->select('DAY(payment_updated_at) as day, SUM(total_price) as total_revenue')
            ->where('payment_status', 'completed')
            ->like('payment_updated_at', $month, 'after')
            ->groupBy('DAY(payment_updated_at)')
            ->findAll();
    
        // Tính toán tổng số tour và đơn đặt hàng
        $totalTours = $toursModel->countAllResults();
        $totalBookings = $bookingModel->countAllResults();
        
        // Lấy danh sách các tour du lịch được đặt nhiều nhất (Top 5)
            $topTours = $bookingModel->select('tours.name, COUNT(bookings.id) as total_bookings')
            ->join('tours', 'tours.id = bookings.tour_id')
            ->groupBy('bookings.tour_id')
            ->orderBy('total_bookings', 'DESC')
            ->limit(5)
            ->findAll();

        // Lấy danh sách khách hàng đặt nhiều đơn hàng nhất (Top 10)
        $topCustomers = $bookingModel->select('customers.name, COUNT(bookings.id) as total_orders')
            ->join('customers', 'customers.id = bookings.customer_id')
            ->groupBy('bookings.customer_id')
            ->orderBy('total_orders', 'DESC')
            ->limit(10)
            ->findAll();
        // Truyền dữ liệu vào view
        $data = [
            'pageTitle' => 'Thống kê',
            'totalCustomers' => $totalCustomers,
            'totalRevenue' => $totalRevenue,
            'dailyRevenue' => $dailyRevenue,
            'paymentStatusData' => $paymentStatusData,
            'monthlyRevenue' => $monthlyRevenue,
            'month' => $month,
            'totalTours' => $totalTours,
            'totalBookings' => $totalBookings,
            'topTours' => $topTours,
            'topCustomers' => $topCustomers,
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Admin.Home')],
            ]
        ];
    
        return view('table', $data);
    }
    
    
}
