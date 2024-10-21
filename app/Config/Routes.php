<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/welcome', 'Welcome::index');

$routes->post('BusinessDetailsController/saveBusinessFormData', 'BusinessDetailsController::saveBusinessFormData');
$routes->post('ContactInformationController/saveContactInfoFormData', 'ContactInformationController::saveContactInfoFormData');
$routes->post('ShippingInformationController/saveShippingInfoFormData', 'ShippingInformationController::saveShippingInfoFormData');
$routes->post('VendorFinanceController/saveVendorFinanceFormData', 'VendorFinanceController::saveVendorFinanceFormData');
$routes->post('VendorSettingController/saveVendorSettingFormData', 'VendorSettingController::saveVendorSettingFormData');
$routes->post('FinancePayInfoController/saveFinancePayInfoFormData', 'FinancePayInfoController::saveFinancePayInfoFormData');
$routes->post('CompanyRmaInfoController/saveCompanyRmaFormData', 'CompanyRmaInfoController::saveCompanyRmaFormData');
$routes->post('InventoryUpdateController/saveInventoryUpdateFormData', 'InventoryUpdateController::saveInventoryUpdateFormData');






