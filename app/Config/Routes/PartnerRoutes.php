<?php 

$routes->group('partner', ['namespace' => 'App\Controllers\Partner', 'filter'=>'PartnerAuth',] ,function ($routes) {

    $routes->get('dashboard', 'PartnerDashboardController::index', ['as' => 'partner.dashboard']);


    $routes->group('profile', function($routes) {
        $routes->get('/', 'PartnerProfileController::index', ['as' => 'partner.profile.index']);
        $routes->post('update', 'PartnerProfileController::update', ['as' => 'partner.profile.update']);
        $routes->post('update-profile-image', 'PartnerProfileController::update_profile_image', ['as' => 'partner.profile.update-profile-image']);
    });

    $routes->group('password', function($routes) {
        $routes->get('/', 'PartnerPasswordController::index', ['as' => 'partner.password.index']);
        $routes->post('update', 'PartnerPasswordController::update', ['as' => 'partner.password.update']);
    });

    $routes->group('kyc', function($routes) {
        $routes->get('/', 'PartnerKycController::index', ['as' => 'partner.kyc.index']);
        $routes->post('update', 'PartnerKycController::update', ['as' => 'partner.kyc.update']);
    });


    $routes->group('package', function($routes) {
        $routes->get('/', 'VendorPackageController::index', ['as' => 'partner.package.list']);
        $routes->get('load_data', 'VendorPackageController::load_data', ['as' => 'partner.package.load_data']);
        $routes->post('get_package', 'VendorPackageController::get_package', ['as' => 'partner.package.get_package']);

    });

    $routes->group('package-history', function($routes) {
        $routes->get('/', 'VendorPackageHistoryController::index', ['as' => 'partner.package-history.list']);
        $routes->get('load_data', 'VendorPackageHistoryController::load_data', ['as' => 'partner.package-history.load_data']);
    });


    $routes->group('lead-enquiry', function($routes) {
        $routes->get('/', 'VendorLeadEnquiryController::index', ['as' => 'partner.lead-enquiry.list']);
        $routes->get('load_data', 'VendorLeadEnquiryController::load_data', ['as' => 'partner.lead-enquiry.load_data']);
        $routes->get('view/(:any)', 'VendorLeadEnquiryController::view/$1', ['as' => 'partner.lead-enquiry.view']);
        $routes->post('scratch', 'VendorLeadEnquiryController::scratch', ['as' => 'partner.lead-enquiry.scratch']);
    });

    $routes->group('booking-enquiry', function($routes) {
        $routes->get('/', 'VendorBookingEnquiryController::index', ['as' => 'partner.booking-enquiry.list']);
        $routes->get('load_data', 'VendorBookingEnquiryController::load_data', ['as' => 'partner.booking-enquiry.load_data']);
        $routes->get('view/(:any)', 'VendorBookingEnquiryController::view/$1', ['as' => 'partner.booking-enquiry.view']);
        $routes->post('scratch', 'VendorBookingEnquiryController::scratch', ['as' => 'partner.booking-enquiry.scratch']);
    });


    
    $routes->group('gemini', function($routes) {

        $routes->group('ask-ally', function($routes) {
            $routes->get('/', 'GeminiController::index');
            $routes->post('update', 'GeminiController::update');
        });

    });



});

