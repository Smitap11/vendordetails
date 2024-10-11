<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/welcome', 'Welcome::index');

$routes->post('form/saveBusinessFormData', 'BusinessDetailsController::saveBusinessFormData');
$routes->post('form/saveContactInfoFormData', 'ContactInformationController::saveContactInfoFormData');
$routes->post('form/saveShippingAccFormData', 'ShippingAccountController::saveShippingAccFormData');




