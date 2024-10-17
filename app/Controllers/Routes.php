<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/test', 'TestController::index');


$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::sentlogin');

$routes->get('/register', 'RegisterController::index');
$routes->post('/register', 'RegisterController::sentregister');

$routes->get('/table', 'RegisterController::datatable');

$routes->get('/datatable', 'RegisterController::datatable');
$routes->get('/testdatatable', 'RegisterController::testdatatable');

$routes->delete('/registercontroller/deleteUser/(:num)', 'RegisterController::deleteUser/$1');  


$routes->get('/register', 'RegisterController::index');
$routes->post('/register', 'RegisterController::sentregister');
$routes->get('/verify', 'RegisterController::verify');
$routes->post('/confirm-otp', 'RegisterController::confirmOTP');


$routes->get('/request-reset', 'PasswordController::requestReset');
$routes->post('/request-reset', 'PasswordController::sendResetOTP');
$routes->get('/verify-reset-otp', 'PasswordController::verifyResetOTP');
$routes->post('/verify-reset-otp', 'PasswordController::confirmResetOTP');
$routes->get('/reset-password', 'PasswordController::resetPassword');
$routes->post('/reset-password', 'PasswordController::updatePassword');





$routes->group('api', function($routes) {
   
    $routes->resource('user', ['controller' => 'APIController']);
    $routes->post('/user','APIController::create');
    $routes->get('/user/(:num)', 'APIController::show/$1');
    $routes->put('/user/(:num)', 'APIController::update/$1');
    $routes->delete('/user/(:num)', 'APIController::delete/$1');
    $routes->post('/user/(:num)', 'APIController::filecode/$1');


 
});




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

$routes->get('test','CustomerController::test');