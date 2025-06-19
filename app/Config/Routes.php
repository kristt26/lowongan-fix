<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('/', function ($routes) {
    $routes->get('', 'Home::index');
    $routes->get('rekrutmen', 'Home::lowongan');
    $routes->get('detail/(:hash)', 'Home::detail/$1');
    $routes->get('success', function () {
        return view('mail/register_success');
    });
});

$routes->group('home', function ($routes) {
    $routes->get('read', 'Home::read');
    $routes->get('read_detail/(:hash)', 'Home::readDetail/$1');
    $routes->get('rekrutmen', 'Home::readLowongan');
    $routes->get('read_rekrutmen', 'Home::readRekrutmen');
});

$routes->group('laporan', function ($routes) {
    $routes->get('', 'Laporan::index');
    $routes->get('export-excel', 'Laporan::exportExcel');
    $routes->get('cetak', 'Laporan::cetak');
});
$routes->get('beranda', 'Admin\Home::index');

$routes->group('auth', function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->get('register', 'Auth::reg');
    $routes->post('daftar', 'Auth::daftar');
    $routes->get('logout', 'Auth::logout');
});


$routes->group('profile', ['filter' => 'auth:Admin,Pelamar'], function ($routes) {
    $routes->get('/', 'Profile::index');
    $routes->get('read', 'Profile::store');
    $routes->put('edit', 'Profile::edit');
});

$routes->group('bidang', ['filter' => 'auth:Admin'], function ($routes) {
    $routes->get('/', 'Admin\Bidang::index');
    $routes->get('read', 'Admin\Bidang::store');
    $routes->post('add', 'Admin\Bidang::add');
    $routes->put('edit', 'Admin\Bidang::edit');
    $routes->delete('delete/(:hash)', 'Admin\Bidang::delete/$1');
});

// Routes for Lamaran
$routes->group('lamaran', ['filter' => 'auth:Admin, Pelamar'],  function ($routes) {
    $routes->get('/', 'Admin\Lamaran::index');
    $routes->get('read', 'Admin\Lamaran::store');
    $routes->get('saya', 'Admin\Lamaran::saya');
    $routes->post('add', 'Admin\Lamaran::add');
    $routes->put('edit', 'Admin\Lamaran::edit');
    $routes->delete('delete/(:hash)', 'Admin\Lamaran::delete/$1');
});

// Routes for Lowongan
$routes->group('lowongan', ['filter' => 'auth:Admin, Pelamar'], function ($routes) {
    $routes->get('/', 'Admin\Lowongan::index');
    $routes->get('read', 'Admin\Lowongan::store');
    $routes->get('aktif', 'Admin\Lowongan::aktif');
    $routes->post('add', 'Admin\Lowongan::add');
    $routes->put('edit', 'Admin\Lowongan::edit');
    $routes->delete('delete/(:hash)', 'Admin\Lowongan::delete/$1');
});

// Routes for Pelamar
$routes->group('pelamar', function ($routes) {
    $routes->get('/', 'Admin\Pelamar::index');
    $routes->get('read', 'Admin\Pelamar::store');
    $routes->post('add', 'Admin\Pelamar::add');
    $routes->put('edit', 'Admin\Pelamar::edit');
    $routes->delete('delete/(:hash)', 'Admin\Pelamar::delete/$1');
});

// Routes for Periode
$routes->group('periode', ['filter' => 'auth:Admin, Pelamar'], function ($routes) {
    $routes->get('/', 'Admin\Periode::index');
    $routes->get('read', 'Admin\Periode::store');
    $routes->post('add', 'Admin\Periode::add');
    $routes->put('edit', 'Admin\Periode::edit');
    $routes->delete('delete/(:hash)', 'Admin\Periode::delete/$1');
});

// Routes for Tahapan
$routes->group('tahapan', ['filter' => 'auth:Admin, Pelamar'], function ($routes) {
    $routes->get('/', 'Admin\Tahapan::index');
    $routes->get('read', 'Admin\Tahapan::store');
    $routes->post('add', 'Admin\Tahapan::add');
    $routes->put('edit', 'Admin\Tahapan::edit');
    $routes->delete('delete/(:hash)', 'Admin\Tahapan::delete/$1');
});

// Routes for Users
$routes->group('users', function ($routes) {
    $routes->get('/', 'Admin\Users::index');
    $routes->get('read', 'Admin\Users::store');
    $routes->post('add', 'Admin\Users::add');
    $routes->put('edit', 'Admin\Users::edit');
    $routes->delete('delete/(:hash)', 'Admin\Users::delete/$1');
});

$routes->group('detail', function ($routes) {
    $routes->put('edit', 'Admin\Detail::edit');
    $routes->delete('delete/(:hash)', 'Admin\Detail::delete/$1');
});
