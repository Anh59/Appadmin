<?php

use CodeIgniter\Router\RouteCollection;
// điều chỉnh hiệu ứng 
/**
 * @var RouteCollection $routes
 */
$routes->group('api_Customers', function($routes) {
   

    $routes->get('customers_register','CustomerController::register', ['as' => 'Customers_Register']);
    $routes->post('customers_register','CustomerController::processRegistration', ['as' => 'Customers_processRegistration']);
    $routes->post('customers_verify_otp', 'CustomerController::verifyOTP', ['as' => 'Customers_verifyOTP']);

    $routes->get('customers_sign','CustomerController::login',['as' => 'Customers_sign']);
    $routes->post('customers_sign','CustomerController::processLogin',['as' => 'Customers_processLogin']);

    $routes->get('testEmail', 'CustomerController::testEmail', ['as' => 'testEmail']);
    

    $routes->get('customers_forgot_password', 'CustomerController::forgotPassword',['as' => 'customes_forgot_password']);
    $routes->post('customers_forgot_password', 'CustomerController::processForgotPassword',['as'=>'Customers_processForgotPassword']);
    $routes->post('customers_pass_verify_otp', 'CustomerController::pass_verifyOTP',['as'=>'Customers_processPassVerifyOTP']);
    $routes->post('customers_reset_password', 'CustomerController::resetPassword',['as' => 'Customes_resetPassword']);

    $routes->get('google_login', 'GoogleController::googleLogin', ['as' => 'google_login']);
    $routes->get('google_callback', 'GoogleController::googleCallback', ['as' => 'google_callback']);

});


// $routes->get('login','UserController::index');
// $routes->get('sign','UserController::sign');
// $routes->get('tableuser','UserController::tableuser');
    
//['filter' => 'Perermissions']
$routes->group('Dashboard', ['filter' => 'Perermissions'], function (RouteCollection $routes) {

    // login
    $routes->get('table', 'Home::table', ['as' => 'Dashboard_table', 'filter' => 'Perermissions:Dashboard_table']);

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
        // $routes->get('table-permissions-create', 'PermissionsController::create', ['as' => 'Table_Permissions_Create', 'filter' => 'Perermissions:Table_Permissions_Create']);
        // $routes->post('table-permissions-store', 'PermissionsController::store', ['as' => 'Table_Permissions_Store', 'filter' => 'Perermissions:Table_Permissions_Store']);
        // $routes->get('table-permissions-edit/(:num)', 'PermissionsController::edit/$1', ['as' => 'Table_Permissions_Edit', 'filter' => 'Perermissions:Table_Permissions_Edit']);
        // $routes->post('table-permissions-update/(:num)', 'PermissionsController::update/$1', ['as' => 'Table_Permissions_Update', 'filter' => 'Perermissions:Table_Permissions_Update']);
        // $routes->post('table-permissions-delete/(:num)', 'PermissionsController::delete/$1', ['as' => 'Table_Permissions_Delete', 'filter' => 'Perermissions:Table_Permissions_Delete']);
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
    });
    
    
    

    

});


$routes->get('/','Home::index');
$routes->get('errors','Home::Errors');


$routes->get('login', 'UserController::loginForm');
$routes->post('login', 'UserController::login');
// $routes->get('register', 'UserController::registerForm');
// $routes->post('register', 'UserController::register');
$routes->get('logout', 'UserController::logout');

//trang chủ 
$routes->get('index', 'Home::index1',['as'=>'Tour_index']);
$routes->get('about', 'Home::index2',['as'=>'Tour_about']);
$routes->get('blog', 'Home::index3',['as'=>'Tour_blog']);
$routes->get('contact', 'Home::index4',['as'=>'Tour_contact']);
$routes->get('elements', 'Home::index5',['as'=>'Tour_elements']);
$routes->get('layout', 'Home::index6');
$routes->get('test', 'Home::index7');
$routes->get('single_listing', 'Home::index9');
$routes->get('offers', 'Home::index8');


//xử lý hiênj thị dữ liệu tour
$routes->group('tour', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('offers', 'SingleController::index',['as'=>'Tour_offers']); // Hiển thị danh sách các tour
    $routes->get('detail/(:num)', 'SingleController::single_listing/$1'); // Hiển thị chi tiết tour với ID
});