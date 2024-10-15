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




