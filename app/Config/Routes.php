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
// ROUTE DASHBOARD ADMIN
// =====================
$routes->get('/admin/dashboard', 'Admin\DashboardController::index');

// =====================
// ROUTE DASHBOARD STAFF
// =====================
$routes->get('/staff/dashboard', 'Staff\DashboardController::index');

// =====================
// ROUTE DASHBOARD NOTARIS
// =====================
$routes->get('/notaris/dashboard', 'Notaris\DashboardController::index');

// =====================
// ROUTE DASHBOARD PEMOHON
// =====================
$routes->get('/pemohon/dashboard', 'Pemohon\DashboardController::index');