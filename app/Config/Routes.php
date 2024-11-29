<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/welcome', 'Welcome::index');
$routes->get('/supplier_registration', 'SupplierRegController::index');
$routes->get('/vendor_dashboard', 'VendorDashboardController::index');


$routes->post('BusinessDetailsController/saveBusinessFormData', 'BusinessDetailsController::saveBusinessFormData');
$routes->post('ContactInformationController/saveContactInfoFormData', 'ContactInformationController::saveContactInfoFormData');
$routes->post('ShippingInformationController/saveShippingInfoFormData', 'ShippingInformationController::saveShippingInfoFormData');
$routes->post('VendorFinanceController/saveVendorFinanceFormData', 'VendorFinanceController::saveVendorFinanceFormData');
$routes->post('VendorSettingController/saveVendorSettingFormData', 'VendorSettingController::saveVendorSettingFormData');
$routes->post('FinancePayInfoController/saveFinancePayInfoFormData', 'FinancePayInfoController::saveFinancePayInfoFormData');
$routes->post('CompanyRmaInfoController/saveCompanyRmaFormData', 'CompanyRmaInfoController::saveCompanyRmaFormData');
$routes->post('InventoryUpdateController/saveInventoryUpdateFormData', 'InventoryUpdateController::saveInventoryUpdateFormData');
$routes->post('VendorDashboardController/fetchVendorData', 'VendorDashboardController::fetchVendorData');
$routes->post('OrderProcessingController/saveOrderProcessingFormData', 'OrderProcessingController::saveOrderProcessingFormData');


$routes->get('/signup', 'AuthController::showSignupForm');
$routes->post('/signup', 'AuthController::register');

$routes->get('/login', 'AuthController::showLoginForm'); // For rendering the login form
$routes->post('/login', 'AuthController::loginForm');    // For handling login submission

// $routes->get('/logout', 'AuthController::logout');
$routes->post('/logout', 'AuthController::logout');

// $routes->get('supplier_registration', 'VendorDashboardController::index', ['filter' => 'auth']);

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    $routes->get('vendor_dashboard', 'VendorDashboardController::index');
    $routes->get('supplier_registration', 'SupplierRegController::index');
});










