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

// $routes->get('auth/signup', 'AuthController::register');
$routes->post('auth/signup', 'AuthController::register');

// $routes->get('auth/login', 'AuthController::login');
$routes->post('auth/login', 'AuthController::login');


// $routes->get('/logout', 'AuthController::logout');
$routes->get('auth/logout', 'AuthController::logout');

$routes->get('supplier_registration', 'VendorDashboardController::index', ['filter' => 'auth']);











