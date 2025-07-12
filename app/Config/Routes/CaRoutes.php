<?php 

$routes->group('ca', ['namespace' => 'App\Controllers\Advocate', 'filter'=>'VendorAuth',] ,function ($routes) {
  

    $routes->get('dashboard', 'VendorDashboardController::index', ['as' => 'ca.dashboard']);


    $routes->group('profile', function($routes) {
        $routes->get('/', 'VendorProfileController::index', ['as' => 'ca.profile.index']);
        $routes->post('update', 'VendorProfileController::update', ['as' => 'ca.profile.update']);
        $routes->post('update-profile-image', 'VendorProfileController::update_profile_image', ['as' => 'ca.profile.update-profile-image']);
    });

    $routes->group('password', function($routes) {
        $routes->get('/', 'VendorPasswordController::index', ['as' => 'ca.password.index']);
        $routes->post('update', 'VendorPasswordController::update', ['as' => 'ca.password.update']);
    });



    $routes->group('package', function($routes) {
        $routes->get('/', 'VendorPackageController::index', ['as' => 'ca.package.list']);
        $routes->get('load_data', 'VendorPackageController::load_data', ['as' => 'ca.package.load_data']);
        $routes->post('get_package', 'VendorPackageController::get_package', ['as' => 'ca.package.get_package']);

    });

    $routes->group('package-history', function($routes) {
        $routes->get('/', 'VendorPackageHistoryController::index', ['as' => 'ca.package-history.list']);
        $routes->get('load_data', 'VendorPackageHistoryController::load_data', ['as' => 'ca.package-history.load_data']);
    });


    $routes->group('lead-enquiry', function($routes) {
        $routes->get('/', 'VendorLeadEnquiryController::index', ['as' => 'ca.lead-enquiry.list']);
        $routes->get('load_data', 'VendorLeadEnquiryController::load_data', ['as' => 'ca.lead-enquiry.load_data']);
        $routes->get('view/(:any)', 'VendorLeadEnquiryController::view/$1', ['as' => 'ca.lead-enquiry.view']);
        $routes->post('scratch', 'VendorLeadEnquiryController::scratch', ['as' => 'ca.lead-enquiry.scratch']);
    });

    $routes->group('booking-enquiry', function($routes) {
        $routes->get('/', 'VendorBookingEnquiryController::index', ['as' => 'ca.booking-enquiry.list']);
        $routes->get('load_data', 'VendorBookingEnquiryController::load_data', ['as' => 'ca.booking-enquiry.load_data']);
        $routes->get('view/(:any)', 'VendorBookingEnquiryController::view/$1', ['as' => 'ca.booking-enquiry.view']);
        $routes->post('scratch', 'VendorBookingEnquiryController::scratch', ['as' => 'ca.booking-enquiry.scratch']);
    });



});

