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
        $dailyRevenue = $bookingModel->select('DATE(booking_date) as date, SUM(total_price) as total_revenue')
            ->where('payment_status', 'completed')
            ->groupBy('DATE(booking_date)')
            ->findAll();

        // Tính toán lượng khách hàng đăng ký mới trong tháng này
        $newCustomers = $customerModel->where('created_at >', date('Y-m-01'))->findAll();

        $totalTours = $toursModel->countAllResults();

        // Tính toán tổng số đơn đặt hàng
        $totalBookings = $bookingModel->countAllResults();
        
        // Truyền dữ liệu vào view
        $data = [
            'pageTitle' => 'Dashboard',
            'totalCustomers' => $totalCustomers,
            'totalRevenue' => $totalRevenue,
            'dailyRevenue' => $dailyRevenue,
            'newCustomers' => count($newCustomers),
            'totalTours' => $totalTours,
            'totalBookings' => $totalBookings,
            'breadcrumb' => [
                ['title' => 'Home', 'url' => route_to('Admin.Home')],
            ]
        ];

        // Trả về view với dữ liệu
        return view('table', $data);
    }
}
