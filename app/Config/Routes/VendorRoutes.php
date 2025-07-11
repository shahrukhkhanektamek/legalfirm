<?php 

$routes->group('vendor', ['namespace' => 'App\Controllers\Vendor', 'filter'=>'VendorAuth',] ,function ($routes) {
  

    $routes->get('dashboard', 'VendorDashboardController::index', ['as' => 'vendor.dashboard']);


    $routes->group('profile', function($routes) {
        $routes->get('/', 'VendorProfileController::index', ['as' => 'vendor.profile.index']);
        $routes->post('update', 'VendorProfileController::update', ['as' => 'vendor.profile.update']);
        $routes->post('update-profile-image', 'VendorProfileController::update_profile_image', ['as' => 'vendor.profile.update-profile-image']);
    });

    $routes->group('password', function($routes) {
        $routes->get('/', 'VendorPasswordController::index', ['as' => 'vendor.password.index']);
        $routes->post('update', 'VendorPasswordController::update', ['as' => 'vendor.password.update']);
    });



    $routes->group('package', function($routes) {
        $routes->get('/', 'VendorPackageController::index', ['as' => 'vendor.package.list']);
        $routes->get('load_data', 'VendorPackageController::load_data', ['as' => 'vendor.package.load_data']);
        $routes->post('get_package', 'VendorPackageController::get_package', ['as' => 'vendor.package.get_package']);

    });

    $routes->group('package-history', function($routes) {
        $routes->get('/', 'VendorPackageHistoryController::index', ['as' => 'vendor.package-history.list']);
        $routes->get('load_data', 'VendorPackageHistoryController::load_data', ['as' => 'vendor.package-history.load_data']);
    });


    $routes->group('lead-enquiry', function($routes) {
        $routes->get('/', 'VendorLeadEnquiryController::index', ['as' => 'vendor.lead-enquiry.list']);
        $routes->get('load_data', 'VendorLeadEnquiryController::load_data', ['as' => 'vendor.lead-enquiry.load_data']);
        $routes->get('view/(:any)', 'VendorLeadEnquiryController::view/$1', ['as' => 'vendor.lead-enquiry.view']);
        $routes->post('scratch', 'VendorLeadEnquiryController::scratch', ['as' => 'vendor.lead-enquiry.scratch']);
    });

    $routes->group('booking-enquiry', function($routes) {
        $routes->get('/', 'VendorBookingEnquiryController::index', ['as' => 'vendor.booking-enquiry.list']);
        $routes->get('load_data', 'VendorBookingEnquiryController::load_data', ['as' => 'vendor.booking-enquiry.load_data']);
        $routes->get('view/(:any)', 'VendorBookingEnquiryController::view/$1', ['as' => 'vendor.booking-enquiry.view']);
        $routes->post('scratch', 'VendorBookingEnquiryController::scratch', ['as' => 'vendor.booking-enquiry.scratch']);
    });



});

