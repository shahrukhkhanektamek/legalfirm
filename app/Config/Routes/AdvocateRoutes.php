<?php 
$routes->group('advocate', ['namespace' => 'App\Controllers\Advocate', 'filter'=>'AdvocateAuth',] ,function ($routes) {


    $routes->get('dashboard', 'AdvocateDashboardController::index', ['as' => 'advocate.dashboard']);


    $routes->group('profile', function($routes) {
        $routes->get('/', 'VendorProfileController::index', ['as' => 'advocate.profile.index']);
        $routes->post('update', 'VendorProfileController::update', ['as' => 'advocate.profile.update']);
        $routes->post('update-profile-image', 'VendorProfileController::update_profile_image', ['as' => 'advocate.profile.update-profile-image']);
    });

    $routes->group('password', function($routes) {
        $routes->get('/', 'VendorPasswordController::index', ['as' => 'advocate.password.index']);
        $routes->post('update', 'VendorPasswordController::update', ['as' => 'advocate.password.update']);
    });



    $routes->group('package', function($routes) {
        $routes->get('/', 'VendorPackageController::index', ['as' => 'advocate.package.list']);
        $routes->get('load_data', 'VendorPackageController::load_data', ['as' => 'advocate.package.load_data']);
        $routes->post('get_package', 'VendorPackageController::get_package', ['as' => 'advocate.package.get_package']);

    });

    $routes->group('package-history', function($routes) {
        $routes->get('/', 'VendorPackageHistoryController::index', ['as' => 'advocate.package-history.list']);
        $routes->get('load_data', 'VendorPackageHistoryController::load_data', ['as' => 'advocate.package-history.load_data']);
    });


    $routes->group('lead-enquiry', function($routes) {
        $routes->get('/', 'VendorLeadEnquiryController::index', ['as' => 'advocate.lead-enquiry.list']);
        $routes->get('load_data', 'VendorLeadEnquiryController::load_data', ['as' => 'advocate.lead-enquiry.load_data']);
        $routes->get('view/(:any)', 'VendorLeadEnquiryController::view/$1', ['as' => 'advocate.lead-enquiry.view']);
        $routes->post('scratch', 'VendorLeadEnquiryController::scratch', ['as' => 'advocate.lead-enquiry.scratch']);
    });

    $routes->group('booking-enquiry', function($routes) {
        $routes->get('/', 'VendorBookingEnquiryController::index', ['as' => 'advocate.booking-enquiry.list']);
        $routes->get('load_data', 'VendorBookingEnquiryController::load_data', ['as' => 'advocate.booking-enquiry.load_data']);
        $routes->get('view/(:any)', 'VendorBookingEnquiryController::view/$1', ['as' => 'advocate.booking-enquiry.view']);
        $routes->post('scratch', 'VendorBookingEnquiryController::scratch', ['as' => 'advocate.booking-enquiry.scratch']);
    });



});

