<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// AUTH (tidak perlu filter)
$routes->get('/login',  'AuthController::index');
$routes->post('/login', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

// =====================
// ROUTE PEMOHON
// =====================
$routes->group('pemohon', ['filter' => 'auth:pemohon'], function($routes) {
    $routes->get('dashboard',              'Pemohon\PermohonanController::index');
    $routes->get('generate-kode',         'Pemohon\PermohonanController::generateKode');
    $routes->post('store',                'Pemohon\PermohonanController::store');
    $routes->get('tracking',              'Pemohon\PermohonanController::tracking');
    $routes->get('tracking/(:segment)',   'Pemohon\PermohonanController::tracking/$1');
    $routes->get('riwayat',              'Pemohon\PermohonanController::riwayat');
    $routes->get('detail/(:segment)',    'Pemohon\PermohonanController::detail/$1');
    $routes->get('notifikasi',           'Pemohon\PermohonanController::notifikasi');
    $routes->get('profil',               'Pemohon\PermohonanController::profil');
    $routes->post('profil',              'Pemohon\PermohonanController::updateProfil');
    $routes->get('panduan',              'Pemohon\PermohonanController::panduan');
});

// =====================
// ROUTE ADMIN
// =====================
$routes->group('admin', ['filter' => 'auth:admin'], function($routes) {
    $routes->get('dashboard',                    'Admin\AdminController::index');
    $routes->get('permohonan-masuk',             'Admin\AdminController::permohonanMasuk');
    $routes->get('permohonan-selesai',           'Admin\AdminController::permohonanSelesai');
    $routes->get('detail/(:segment)',            'Admin\AdminController::detail/$1');
    $routes->post('ubah-status/(:num)',          'Admin\AdminController::ubahStatus/$1');
    $routes->post('validasi-dokumen/(:num)',     'Admin\AdminController::validasiDokumen/$1');
    $routes->post('hitung-pajak/(:num)',         'Admin\AdminController::hitungPajak/$1');
    $routes->get('audit-trail',                  'Admin\AdminController::auditTrail');
    $routes->get('users',                        'Admin\AdminController::users');
    $routes->get('profil',                       'Admin\AdminController::profil');
    $routes->post('profil',                      'Admin\AdminController::updateProfil');
    $routes->get('lihat-dokumen/(:num)', '\App\Controllers\FileController::lihatDokumen/$1');
    $routes->get('lihat-draft/(:num)',   '\App\Controllers\FileController::lihatDraft/$1');
});

// =====================
// ROUTE STAFF
// =====================
$routes->group('staff', ['filter' => 'auth:staff'], function($routes) {
    $routes->get('dashboard',            'Staff\StaffController::index');
    $routes->get('detail/(:segment)',    'Staff\StaffController::detail/$1');
    $routes->post('submit-draft/(:num)', 'Staff\StaffController::submitDraft/$1');
    $routes->get('lihat-dokumen/(:num)', '\App\Controllers\FileController::lihatDokumen/$1');
    $routes->get('lihat-draft/(:num)',   '\App\Controllers\FileController::lihatDraft/$1');
});

// =====================
// ROUTE NOTARIS
// =====================
$routes->group('notaris', ['filter' => 'auth:notaris'], function($routes) {
    $routes->get('dashboard',           'Notaris\NotarisController::index');
    $routes->get('detail/(:segment)',   'Notaris\NotarisController::detail/$1');
    $routes->post('setujui/(:num)',     'Notaris\NotarisController::setujui/$1');
    $routes->post('tolak/(:num)',       'Notaris\NotarisController::tolak/$1');
    $routes->get('lihat-dokumen/(:num)', '\App\Controllers\FileController::lihatDokumen/$1');
    $routes->get('lihat-draft/(:num)',   '\App\Controllers\FileController::lihatDraft/$1');
});