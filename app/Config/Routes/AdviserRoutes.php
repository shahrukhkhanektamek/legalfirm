<?php 

$routes->group('adviser', ['namespace' => 'App\Controllers\Advocate', 'filter'=>'VendorAuth',] ,function ($routes) {
  

    $routes->get('dashboard', 'VendorDashboardController::index', ['as' => 'adviser.dashboard']);


    $routes->group('profile', function($routes) {
        $routes->get('/', 'VendorProfileController::index', ['as' => 'adviser.profile.index']);
        $routes->post('update', 'VendorProfileController::update', ['as' => 'adviser.profile.update']);
        $routes->post('update-profile-image', 'VendorProfileController::update_profile_image', ['as' => 'adviser.profile.update-profile-image']);
    });

    $routes->group('password', function($routes) {
        $routes->get('/', 'VendorPasswordController::index', ['as' => 'adviser.password.index']);
        $routes->post('update', 'VendorPasswordController::update', ['as' => 'adviser.password.update']);
    });



    $routes->group('package', function($routes) {
        $routes->get('/', 'VendorPackageController::index', ['as' => 'adviser.package.list']);
        $routes->get('load_data', 'VendorPackageController::load_data', ['as' => 'adviser.package.load_data']);
        $routes->post('get_package', 'VendorPackageController::get_package', ['as' => 'adviser.package.get_package']);

    });

    $routes->group('package-history', function($routes) {
        $routes->get('/', 'VendorPackageHistoryController::index', ['as' => 'adviser.package-history.list']);
        $routes->get('load_data', 'VendorPackageHistoryController::load_data', ['as' => 'adviser.package-history.load_data']);
    });


    $routes->group('lead-enquiry', function($routes) {
        $routes->get('/', 'VendorLeadEnquiryController::index', ['as' => 'adviser.lead-enquiry.list']);
        $routes->get('load_data', 'VendorLeadEnquiryController::load_data', ['as' => 'adviser.lead-enquiry.load_data']);
        $routes->get('view/(:any)', 'VendorLeadEnquiryController::view/$1', ['as' => 'adviser.lead-enquiry.view']);
        $routes->post('scratch', 'VendorLeadEnquiryController::scratch', ['as' => 'adviser.lead-enquiry.scratch']);
    });

    $routes->group('booking-enquiry', function($routes) {
        $routes->get('/', 'VendorBookingEnquiryController::index', ['as' => 'adviser.booking-enquiry.list']);
        $routes->get('load_data', 'VendorBookingEnquiryController::load_data', ['as' => 'adviser.booking-enquiry.load_data']);
        $routes->get('view/(:any)', 'VendorBookingEnquiryController::view/$1', ['as' => 'adviser.booking-enquiry.view']);
        $routes->post('scratch', 'VendorBookingEnquiryController::scratch', ['as' => 'adviser.booking-enquiry.scratch']);
    });



});

