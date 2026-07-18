<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// =====================
// ROUTE AUTH (LOGIN)
// =====================
$routes->get('/login', 'AuthController::index');
$routes->post('/login', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

// =====================
// ROUTE ADMIN
// =====================
$routes->get('/admin/dashboard',                'Admin\AdminController::index');
$routes->get('/admin/permohonan-masuk',         'Admin\AdminController::permohonanMasuk');
$routes->get('/admin/permohonan-selesai',       'Admin\AdminController::permohonanSelesai');
$routes->get('/admin/detail/(:segment)',        'Admin\AdminController::detail/$1');
$routes->post('/admin/ubah-status/(:num)',      'Admin\AdminController::ubahStatus/$1');
$routes->post('/admin/validasi-dokumen/(:num)', 'Admin\AdminController::validasiDokumen/$1');
$routes->post('/admin/hitung-pajak/(:num)',     'Admin\AdminController::hitungPajak/$1');
$routes->get('/admin/audit-trail',  'Admin\AdminController::auditTrail');
$routes->get('/admin/users',        'Admin\AdminController::users');
$routes->get('/admin/profil',       'Admin\AdminController::profil');
$routes->post('/admin/profil',      'Admin\AdminController::updateProfil');

// =====================
// ROUTE DASHBOARD STAFF
// =====================
$routes->get('/staff/dashboard', 'Staff\DashboardController::index');

// =====================
// ROUTE DASHBOARD NOTARIS
// =====================
$routes->get('/notaris/dashboard', 'Notaris\DashboardController::index');

// =====================
// ROUTE PEMOHON
// =====================
$routes->get('/pemohon/dashboard',          'Pemohon\PermohonanController::index');
$routes->get('/pemohon/generate-kode',      'Pemohon\PermohonanController::generateKode');
$routes->post('/pemohon/store',             'Pemohon\PermohonanController::store');
$routes->get('/pemohon/tracking',           'Pemohon\PermohonanController::tracking');
$routes->get('/pemohon/tracking/(:segment)','Pemohon\PermohonanController::tracking/$1');
$routes->get('/pemohon/riwayat',            'Pemohon\PermohonanController::riwayat');
$routes->get('/pemohon/detail/(:segment)', 'Pemohon\PermohonanController::detail/$1');
$routes->get('/pemohon/notifikasi', 'Pemohon\PermohonanController::notifikasi');
$routes->get('/pemohon/profil',     'Pemohon\PermohonanController::profil');
$routes->post('/pemohon/profil',    'Pemohon\PermohonanController::updateProfil');
$routes->get('/pemohon/panduan',    'Pemohon\PermohonanController::panduan');