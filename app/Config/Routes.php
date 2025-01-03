<?php

use CodeIgniter\Router\RouteCollection;
// điều chỉnh hiệu ứng 
/**
 * @var RouteCollection $routes
 */

$routes->group('api_Customers',function($routes) {
   

    $routes->get('customers_register','CustomerController::register', ['as' => 'Customers_Register']);
    $routes->post('customers_register','CustomerController::processRegistration', ['as' => 'Customers_processRegistration']);
    $routes->post('customers_verify_otp', 'CustomerController::verifyOTP', ['as' => 'Customers_verifyOTP']);

    $routes->get('customers_sign','CustomerController::login',['as' => 'Customers_sign']);
    $routes->post('customers_sign','CustomerController::processLogin',['as' => 'Customers_processLogin']);

    $routes->get('customers_logout','CustomerController::logout',['as' => 'Customers_logout']);
    $routes->get('testEmail', 'CustomerController::testEmail', ['as' => 'testEmail']);
    

    $routes->get('customers_forgot_password', 'CustomerController::forgotPassword',['as' => 'customes_forgot_password']);
    $routes->post('customers_forgot_password', 'CustomerController::processForgotPassword',['as'=>'Customers_processForgotPassword']);
    $routes->post('customers_pass_verify_otp', 'CustomerController::pass_verifyOTP',['as'=>'Customers_processPassVerifyOTP']);
    $routes->post('customers_reset_password', 'CustomerController::resetPassword',['as' => 'Customes_resetPassword']);

    $routes->get('google_login', 'GoogleController::googleLogin', ['as' => 'google_login']);
    $routes->get('google_callback', 'GoogleController::googleCallback', ['as' => 'google_callback']);
    
    $routes->group('Manager',  ['filter' => 'authCheck'],function($routes) {
        $routes->get('profile','Profilecontroller::profile', ['as' => 'profile']);
        $routes->get('personal', 'ProfileController::personal', ['as' => 'personal']);


        $routes->get('change_password','Profilecontroller::change_password', ['as' => 'change_password']);
        $routes->post('changePassword', 'ProfileController::changePassword', ['as' => 'changePassword']);

        $routes->get('changePersonalInfo', 'ProfileController::changePersonalInfo', ['as' => 'changePersonalInfo']);
        
        $routes->post('updatePersonalInfo', 'ProfileController::updatePersonalInfo',['as' => 'updatePersonalInfo']);
        $routes->get('verifyChangeEmailOTP', 'ProfileController::verifyChangeEmailOTP', ['as' => 'verifyChangeEmailOTP']);
        $routes->post('verifyChangeEmailOTP', 'ProfileController::handleVerifyChangeEmailOTP', ['as' => 'handleVerifyChangeEmailOTP']);



        $routes->get('order','ProfileController::order', ['as' => 'order']);
        $routes->get('detail_order/(:num)', 'ProfileController::detail_order/$1', ['as' => 'detail_order']);
        $routes->get('history_order','ProfileController::history_order', ['as' => 'history_order']);
        $routes->get('detail_history_order/(:num)', 'ProfileController::detail_history_order/$1', ['as' => 'detail_history_order']);
        $routes->get('history_order/delete/(:num)', 'ProfileController::delete_order/$1', ['as' => 'delete_order']);//xoá đơn hàng
        $routes->get('history_order/reorder/(:num)', 'ProfileController::reorder/$1', ['as' => 'reorder']);//đặt lại đơn hàng
        $routes->post('cancel/(:num)', 'ProfileController::cancelOrder/$1', ['as' => 'cancel_order']);//huỷ đơn hàng đã đặt
        $routes->get('reviews/(:num)', 'ProfileController::reviews/$1',['as'=>'reviews']); // Hiển thị trang đánh giá
        $routes->post('reviews/submit/(:num)', 'ProfileController::submitReview/$1',['as'=>'submitReview']); // Xử lý gửi đánh giá

    });
  
});

$routes->get('index', 'Home::index1',['as'=>'Tour_index']);
$routes->get('about', 'Home::index2',['as'=>'Tour_about']);
$routes->get('blog', 'NewsController::newsList',['as'=>'Tour_blog']);



$routes->get('elements', 'Home::index5',['as'=>'Tour_elements']);
$routes->get('layout', 'Home::index6');
$routes->get('test', 'Home::index7');
$routes->get('booking', 'Home::index8',['as'=>'Tour_booking']);

$routes->get('single_listing', 'Home::index9');




$routes->get('/tour/bookTour/(:num)', 'TourController::bookTour/$1');


$routes->get('contact', 'Home::index4',['as'=>'Tour_contact']);
$routes->post('submit-consultation', 'ConsultationController::submitConsultation');

$routes->get('blogdetail/(:num)', 'NewsController::blogDetail/$1', ['as' => 'Tour_blogdetail']);
$routes->post('submit-comment', 'NewsController::submitComment', ['as' => 'submit-comment']);


$routes->post('Tour_booking', 'BookingController::createBooking');

//check_out

$routes->get('booking/checkout/(:num)', 'BookingController::checkout/$1');
$routes->post('checkout/apply_discount', 'BookingController::applyDiscount');
$routes->post('checkout/process_payment', 'BookingController::processPayment');
$routes->get('booking/thanks', 'BookingController::thanks');
$routes->post('booking/ipn_momo', 'BookingController::ipnMoMo');

$routes->post('onlinecheckout','OnlinecheckoutController:Onlinecheck',['as'=>'Onlinecheckout']);
$routes->get('onlinecheckout','OnlinecheckoutController:Onlinecheck',['as'=>'Onlinecheckout']);
$routes->get('booking/config_order','Home::checkout',['as'=>'config_order']);//thông báo thành công
// $routes->get('booking/thanks)', 'BookingController::thanks');








// $routes->get('login','UserController::index');
// $routes->get('sign','UserController::sign');
// $routes->get('tableuser','UserController::tableuser');
    
//['filter' => 'Perermissions']
$routes->group('Dashboard', ['filter' => 'Perermissions'], function (RouteCollection $routes) {

    // login
    $routes->get('table', 'DashboardController::table', ['as' => 'Dashboard_table', 'filter' => 'Perermissions:Dashboard_table']);

    // Group
    $routes->group('Group', ['filter' => 'Perermissions'], function (RouteCollection $routes) {
        $routes->get('table-group', 'GroupController::table', ['as' => 'Table_Group', 'filter' => 'Perermissions:Table_Group']);
        $routes->get('table-create', 'GroupController::create', ['as' => 'Table_Create', 'filter' => 'Perermissions:Table_Create']);
        $routes->post('table-store', 'GroupController::store', ['as' => 'Table_Store', 'filter' => 'Perermissions:Table_Store']);
        $routes->post('group-update/(:num)', 'GroupController::update/$1', ['as' => 'Group_update', 'filter' => 'Perermissions:Group_update']);
        $routes->get('group-edit/(:num)', 'GroupController::edit/$1', ['as' => 'Group_edit', 'filter' => 'Perermissions:Group_edit']);
        $routes->post('group-delete/(:num)', 'GroupController::delete/$1', ['as' => 'Group_delete', 'filter' => 'Perermissions:Group_delete']);
    });

    // Role
    $routes->group('Role', function (RouteCollection $routes) {  
        $routes->get('table-role', 'RoleController::table', ['as' => 'Table_Role', 'filter' => 'Perermissions:Table_Role']);
        $routes->get('table-role-create', 'RoleController::create', ['as' => 'Table_Role_Create', 'filter' => 'Perermissions:Table_Role_Create']);
        $routes->post('table-role-store', 'RoleController::store', ['as' => 'Table_Role_Store', 'filter' => 'Perermissions:Table_Role_Store']);
        $routes->get('table-role-edit/(:num)', 'RoleController::edit/$1', ['as' => 'Table_Role_Edit', 'filter' => 'Perermissions:Table_Role_Edit']);
        $routes->post('table-role-update/(:num)', 'RoleController::update/$1', ['as' => 'Table_Role_Update', 'filter' => 'Perermissions:Table_Role_Update']);
        $routes->post('table-role-delete/(:num)', 'RoleController::delete/$1', ['as' => 'Table_Role_Delete', 'filter' => 'Perermissions:Table_Role_Delete']);
    });

    // Group_Role
    $routes->group('Group_Role', function (RouteCollection $routes) {
        $routes->get('table-groupRole', 'GroupRoleController::table', ['as' => 'Table_GroupRole', 'filter' => 'Perermissions:Table_GroupRole']);
        $routes->get('table-groupRole-create', 'GroupRoleController::create', ['as' => 'Table_GroupRole_Create', 'filter' => 'Perermissions:Table_GroupRole_Create']);
        $routes->post('table-groupRole-store', 'GroupRoleController::store', ['as' => 'Table_GroupRole_Store', 'filter' => 'Perermissions:Table_GroupRole_Store']);
        $routes->get('table-groupRole-edit/(:num)', 'GroupRoleController::edit/$1', ['as' => 'Table_GroupRole_Edit', 'filter' => 'Perermissions:Table_GroupRole_Edit']);
        $routes->post('table-groupRole-update/(:num)', 'GroupRoleController::update/$1', ['as' => 'Table_GroupRole_Update', 'filter' => 'Perermissions:Table_GroupRole_Update']);
        $routes->post('table-groupRole-delete/(:num)', 'GroupRoleController::delete/$1', ['as' => 'Table_GroupRole_Delete', 'filter' => 'Perermissions:Table_GroupRole_Delete']);
    });

    // Permissions
    $routes->group('permissions', function (RouteCollection $routes) {
        $routes->get('table-permissions', 'PermissionsController::table', ['as' => 'Table_Permissions', 'filter' => 'Perermissions:Table_Permissions']);
        $routes->get('tableuser_list', 'PermissionsController::tableuser_list', ['as' => 'Table_User_List', 'filter' => 'Perermissions:Table_User_List']);
        $routes->get('fetch-table-updates', 'PermissionsController::fetchTableUpdates', ['as' => 'Fetch_Table_Updates']);

    });

    // User
    $routes->group('User', function (RouteCollection $routes) {
         $routes->get('table-user', 'TableUserController::tableuser', ['as' => 'Table_User', 'filter' => 'Perermissions:Table_User']);
         $routes->post('change_user_group', 'TableUserController::changeUserGroup', ['as' => 'change_user_group']);
         $routes->get('table-user-create', 'TableUserController::create', ['as' => 'Table_User_Create', 'filter' => 'Perermissions:Table_User_Create']);
         $routes->post('table-user-store', 'TableUserController::store', ['as' => 'Table_User_Store', 'filter' => 'Perermissions:Table_User_Store']);
         $routes->get('table-user-edit/(:num)', 'TableUserController::editUser/$1', ['as' => 'Table_User_Edit', 'filter' => 'Perermissions:Table_User_Edit']);
         $routes->post('table-user-update/(:num)', 'TableUserController::updateUser/$1', ['as' => 'Table_User_Update', 'filter' => 'Perermissions:Table_User_Update']);
         $routes->post('table-user-delete/(:num)', 'TableUserController::deleteUser/$1', ['as' => 'Table_User_Delete', 'filter' => 'Perermissions:Table_User_Delete']);
    });
    $routes->group('Customers', function (RouteCollection $routes) {
        $routes->get('table-customers', 'TableCustomersController::table', ['as' => 'Table_Customers', 'filter' => 'Perermissions:Table_Customers']);
        $routes->get('table-customers-create', 'TableCustomersController::create', ['as' => 'Table_Customers_Create', 'filter' => 'Perermissions:Table_Customers_Create']);
        $routes->post('table-customers-store', 'TableCustomersController::store', ['as' => 'Table_Customers_Store', 'filter' => 'Perermissions:Table_Customers_Store']);
        $routes->get('table-customers-edit/(:num)', 'TableCustomersController::edit/$1', ['as' => 'Table_Customers_Edit', 'filter' => 'Perermissions:Table_Customers_Edit']);
        $routes->post('table-customers-update/(:num)', 'TableCustomersController::update/$1', ['as' => 'Table_Customers_Update', 'filter' => 'Perermissions:Table_Customers_Update']);
        $routes->post('table-customers-delete/(:num)', 'TableCustomersController::delete/$1', ['as' => 'Table_Customers_Delete', 'filter' => 'Perermissions:Table_Customers_Delete']);
        //$routes->post('table-customers-lock/(:num)', 'TableCustomersController::lockCustomer/$1', ['as' => 'Table_Customers_Lock', 'filter' => 'Perermissions:Table_Customers_Lock']);
    });
    
    $routes->group('Tours', function (RouteCollection $routes) {
        $routes->get('table-tours', 'ToursController::table', ['as' => 'Table_Tours', 'filter' => 'Perermissions:Table_Tours']);
        $routes->get('table-tours-create', 'ToursController::create', ['as' => 'Table_Tours_Create', 'filter' => 'Perermissions:Table_Tours_Create']);
        $routes->post('table-tours-store', 'ToursController::store', ['as' => 'Table_Tours_Store', 'filter' => 'Perermissions:Table_Tours_Store']);
        $routes->get('table-tours-edit/(:num)', 'ToursController::edit/$1', ['as' => 'Table_Tours_Edit', 'filter' => 'Perermissions:Table_Tours_Edit']);
        $routes->post('table-tours-update/(:num)', 'ToursController::update/$1', ['as' => 'Table_Tours_Update', 'filter' => 'Perermissions:Table_Tours_Update']);
        $routes->post('table-tours-delete/(:num)', 'ToursController::delete/$1', ['as' => 'Table_Tours_Delete', 'filter' => 'Perermissions:Table_Tours_Delete']);
        $routes->get('table-tours-detail/(:num)', 'ToursController::details/$1', ['as' => 'Table_Tours_Details', 'filter' => 'Perermissions:Table_Tours_Details']);

    });
    
    
    $routes->group('Rooms', function (RouteCollection $routes) {
        $routes->get('table-rooms', 'RoomsController::table', ['as' => 'Table_Rooms']);
        $routes->get('table-rooms-create', 'RoomsController::create', ['as' => 'Table_Rooms_Create']);
        $routes->get('table-rooms-detail/(:num)', 'RoomsController::details/$1', ['as' => 'Table_Rooms_Details']);
        $routes->post('table-rooms-store', 'RoomsController::store', ['as' => 'Table_Rooms_Store']);
        $routes->get('table-rooms-edit/(:num)', 'RoomsController::edit/$1', ['as' => 'Table_Rooms_Edit']);
        $routes->post('table-rooms-update/(:num)', 'RoomsController::update/$1', ['as' => 'Table_Rooms_Update']);
        $routes->post('table-rooms-delete/(:num)', 'RoomsController::delete/$1', ['as' => 'Table_Rooms_Delete']);
    });

    $routes->group('Transports', function (RouteCollection $routes) {
        $routes->get('table-transports', 'TransportController::table', ['as' => 'Table_Transports']);
        $routes->get('table-transports-create', 'TransportController::create', ['as' => 'Table_Transports_Create']);
        $routes->get('table-transports-detail/(:num)', 'TransportController::details/$1', ['as' => 'Table_Transports_Details']);
        $routes->post('table-transports-store', 'TransportController::store', ['as' => 'Table_Transports_Store']);
        $routes->get('table-transports-edit/(:num)', 'TransportController::edit/$1', ['as' => 'Table_Transports_Edit']);
        $routes->post('table-transports-update/(:num)', 'TransportController::update/$1', ['as' => 'Table_Transports_Update']);
        $routes->post('table-transports-delete/(:num)', 'TransportController::delete/$1', ['as' => 'Table_Transports_Delete']);
    });

    $routes->group('Consultations', function (RouteCollection $routes) {
        $routes->get('table-consultations', 'ConsultationController::table', ['as' => 'Table_Consultations']);
        $routes->get('table-consultations-detail/(:num)', 'ConsultationController::details/$1', ['as' => 'Table_Consultations_Details']);
        $routes->post('table-consultations-delete/(:num)', 'ConsultationController::delete/$1', ['as' => 'Table_Consultations_Delete']);

   
        $routes->get('table-consultations/reply/(:num)', 'ConsultationController::reply/$1', ['as' => 'Table_Consultations_Reply']);
        $routes->post('table-consultations/send-reply/(:num)', 'ConsultationController::sendReply/$1', ['as' => 'Table_Consultations_Send_Reply']);
    });
    $routes->group('Promotions', function (RouteCollection $routes) {
        $routes->get('table-promotions', 'PromotionController::table', ['as' => 'Table_Promotions']);
        $routes->get('table-promotions-create', 'PromotionController::create', ['as' => 'Table_Promotions_Create']);
        $routes->get('table-promotions-detail/(:num)', 'PromotionController::details/$1', ['as' => 'Table_Promotions_Details']);
        $routes->post('table-promotions-store', 'PromotionController::store', ['as' => 'Table_Promotions_Store']);
        $routes->get('table-promotions-edit/(:num)', 'PromotionController::edit/$1', ['as' => 'Table_Promotions_Edit']);
        $routes->post('table-promotions-update/(:num)', 'PromotionController::update/$1', ['as' => 'Table_Promotions_Update']);
        $routes->delete('table-promotions-delete/(:num)', 'PromotionController::delete/$1', ['as' => 'Table_Promotions_Delete']);
    });
    $routes->group('Bookings', function (RouteCollection $routes) {
        $routes->get('table-bookings', 'ManagebookingController::table', ['as' => 'Table_Bookings']);
        $routes->get('table-bookings-create', 'ManagebookingController::create', ['as' => 'Table_Bookings_Create']);
        $routes->get('table-bookings-detail/(:num)', 'ManagebookingController::details/$1', ['as' => 'Table_Bookings_Details']);
        $routes->post('table-bookings-store', 'ManagebookingController::store', ['as' => 'Table_Bookings_Store']);
        $routes->get('table-bookings-edit/(:num)', 'ManagebookingController::edit/$1', ['as' => 'Table_Bookings_Edit']);
        $routes->post('table-bookings-update/(:num)', 'ManagebookingController::update/$1', ['as' => 'Table_Bookings_Update']);
        $routes->post('table-bookings-delete/(:num)', 'ManagebookingController::delete/$1', ['as' => 'Table_Bookings_Delete']);
        $routes->post('update-payment-status', 'ManagebookingController::updatePaymentStatus', ['as' => 'Table_Bookings_Update_Payment_Status']);
    });
    $routes->group('News', function (RouteCollection $routes) {
        // Danh sách bài viết
        $routes->get('table-news', 'NewsController::table', ['as' => 'Table_News']);
        // Thêm bài viết
        $routes->get('table-news-create', 'NewsController::create', ['as' => 'Table_News_Create']);
        // Chi tiết bài viết
        $routes->get('table-news-detail/(:num)', 'NewsController::detail/$1', ['as' => 'Table_News_Detail']);
        // Lưu bài viết
        $routes->post('table-news-store', 'NewsController::store', ['as' => 'Table_News_Store']);
        // Sửa bài viết
        $routes->get('table-news-edit/(:num)', 'NewsController::edit/$1', ['as' => 'Table_News_Edit']);
        // Cập nhật bài viết
        $routes->post('table-news-update/(:num)', 'NewsController::update/$1', ['as' => 'Table_News_Update']);
        // Xóa bài viết
        $routes->post('table-news-delete/(:num)', 'NewsController::delete/$1', ['as' => 'Table_News_Delete']);



    });
    
    
    

});


$routes->get('/',to: 'Home::index');
$routes->get('errors','Home::Errors');


$routes->get('login', 'UserController::loginForm');
$routes->post('login', 'UserController::login');
// $routes->get('register', 'UserController::registerForm');
// $routes->post('register', 'UserController::register');
$routes->get('logout', 'UserController::logout');

//trang chủ 

// $routes->get('offers', 'Home::index8');



//xử lý hiênj thị dữ liệu tour
$routes->group('tour', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('offers', 'SingleController::index',['as'=>'Tour_offers']); // Hiển thị danh sách các tour
    $routes->get('detail/(:num)', 'SingleController::single_listing/$1'); // Hiển thị chi tiết tour với ID
});