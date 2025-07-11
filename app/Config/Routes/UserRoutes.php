<?php 

$routes->group('user', ['namespace' => 'App\Controllers\User', 'filter'=>'UserAuth',] ,function ($routes) {
    
    // $routes->add('user/(:any)', 'Home::all/$1');

    $routes->get('dashboard', 'UserDashboardController::index', ['as' => 'user.dashboard']);


    $routes->group('profile', function($routes) {
        $routes->get('/', 'UserProfileController::index', ['as' => 'user.profile.index']);
        $routes->post('update', 'UserProfileController::update', ['as' => 'user.profile.update']);
        $routes->post('update-profile-image', 'UserProfileController::update_profile_image', ['as' => 'user.profile.update-profile-image']);
    });

    $routes->group('password', function($routes) {
        $routes->get('/', 'UserPasswordController::index', ['as' => 'user.password.index']);
        $routes->post('update', 'UserPasswordController::update', ['as' => 'user.password.update']);
    });



    $routes->group('package', function($routes) {
        $routes->get('/', 'UserPackageController::index', ['as' => 'user.package.list']);
        $routes->get('load_data', 'UserPackageController::load_data', ['as' => 'user.package.load_data']);
        $routes->post('get_package', 'UserPackageController::get_package', ['as' => 'user.package.get_package']);

    });

    $routes->group('package-history', function($routes) {
        $routes->get('/', 'UserPackageHistoryController::index', ['as' => 'user.package-history.list']);
        $routes->get('load_data', 'UserPackageHistoryController::load_data', ['as' => 'user.package-history.load_data']);
    });


    $routes->group('lead-enquiry', function($routes) {
        $routes->get('/', 'UserLeadEnquiryController::index', ['as' => 'user.lead-enquiry.list']);
        $routes->get('load_data', 'UserLeadEnquiryController::load_data', ['as' => 'user.lead-enquiry.load_data']);
        $routes->get('view/(:any)', 'UserLeadEnquiryController::view/$1', ['as' => 'user.lead-enquiry.view']);
        $routes->post('scratch', 'UserLeadEnquiryController::scratch', ['as' => 'user.lead-enquiry.scratch']);
    });

    $routes->group('booking-enquiry', function($routes) {
        $routes->get('/', 'UserBookingEnquiryController::index', ['as' => 'user.booking-enquiry.list']);
        $routes->get('load_data', 'UserBookingEnquiryController::load_data', ['as' => 'user.booking-enquiry.load_data']);
        $routes->get('view/(:any)', 'UserBookingEnquiryController::view/$1', ['as' => 'user.booking-enquiry.view']);
        $routes->post('scratch', 'UserBookingEnquiryController::scratch', ['as' => 'user.booking-enquiry.scratch']);
    });



});

