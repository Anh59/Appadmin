<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
  

// $routes->get('login','UserController::index');
// $routes->get('sign','UserController::sign');
// $routes->get('tableuser','UserController::tableuser');
    

$routes->group('Dashborad', ['filter' => 'log'],function (RouteCollection $routes) {

    // login
    $routes->get('table','Home::table');  
    //Group
    $routes->get('table-group','GroupController::table',['as'=>'Table_Group']);
    $routes->get('table-create','GroupController::create',['as'=> 'Table_Create']);
    $routes->post('table-store','GroupController::store',['as'=> 'Table_Store']);    
    $routes->post('group-update/(:num)','GroupController::update/$1',['as'=> 'Group_update']);
    $routes->get('group-edit/(:num)','GroupController::edit/$1',['as'=> 'Group_edit']);   
    $routes->post('group-delete/(:num)','GroupController::delete/$1',['as'=> 'Group_delete']);
    
    //Role
    $routes->get('table-role','RoleController::table',['as'=> 'Table_Role']);
    $routes->post('Table-roles', 'RoleController::assignRoles', ['as' => 'Table_roles']);

    $routes->get('test','RoleController::index',['as'=> 'Test_Role']);

    //Group_Role
    $routes->get('table-groupRole','GroupRoleController::table',['as'=> 'Table_GroupRole']);
    $routes->get('Table-groupRole-edit/(:num)','GroupRoleController::edit/$1',['as'=> 'Table_GroupRole_Edit']);
    $routes->post('Table-groupRole-update/(:num)','GroupRoleController::update/$1',['as'=> 'Table_GroupRole_update']);
    
    //permissions
    $routes->get('table-permissions','PermissionsController::table',['as'=> 'Table_Permissions']);

    //User
    $routes->get('table-user','TableUserController::tableuser',['as'=> 'Table_User']);
    $routes->get('tableuser_list','TableUserController::tableuser_list');


});



$routes->get('login', 'UserController::loginForm');
$routes->post('login', 'UserController::login');
$routes->get('register', 'UserController::registerForm');
$routes->post('register', 'UserController::register');
$routes->get('logout', 'UserController::logout');


