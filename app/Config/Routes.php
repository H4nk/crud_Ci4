<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 //$routes->setAutoRoute(true);

$routes->get('/', 'Home::index');
$routes->get('/test_view', 'Test_view::index');
$routes->get('/karyawan', 'Karyawan::index');
$routes->get('/karyawan/edit/(:num)', 'Karyawan::edit/$1');
$routes->get('/karyawan/hapus/(:num)', 'Karyawan::hapus/$1');
$routes->post('/karyawan/add', 'Karyawan::add');
$routes->post('/karyawan/update', 'Karyawan::update');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

