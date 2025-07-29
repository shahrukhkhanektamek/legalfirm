<?php 



$routes->add('(.*)', 'Home::all/$1');
// $routes->add('user/(:any)', 'Home::all/$1');
$routes->get('for-testing', 'Test::index');


$routes->post('bike-modal', 'Home::bike_modal');



$routes->post('search-vendor', 'Home::search_vendor');
$routes->post('search-country', 'Home::search_country');
$routes->post('search-state', 'Home::search_state');
$routes->post('search-city', 'Home::search_city');
$routes->post('search-education', 'Home::search_education');


$routes->post('contact-enquiry', 'Enquiry::contact_enquiry');
$routes->post('bike-enquiry', 'Enquiry::bike_enquiry');
$routes->post('bike-booking-enquiry', 'Enquiry::bike_booking_enquiry');




