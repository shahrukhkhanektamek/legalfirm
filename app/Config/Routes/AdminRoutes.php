<?php 

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter'=>'AdminAuth',] ,function ($routes) {
    
    $routes->get('dashboard', 'AdminDashboardController::index', ['as' => 'admin.dashboard']);


    $routes->group('profile', function($routes) {
        $routes->get('/', 'AdminProfileController::index', ['as' => 'admin.profile.index']);
        $routes->post('update', 'AdminProfileController::update', ['as' => 'admin.profile.update']);
        $routes->post('update-profile-image', 'AdminProfileController::update_profile_image', ['as' => 'admin.profile.update-profile-image']);
    });

    $routes->group('password', function($routes) {
        $routes->get('/', 'AdminPasswordController::index', ['as' => 'admin.password.index']);
        $routes->post('update', 'AdminPasswordController::update', ['as' => 'admin.password.update']);
    });

    $routes->group('setting', function($routes) {
        $routes->get('main', 'AdminSettingController::main', ['as' => 'setting.main']);
        $routes->post('main-update', 'AdminSettingController::main_update', ['as' => 'setting.main-update']);

        $routes->get('policy', 'AdminSettingController::policy', ['as' => 'setting.policy']);
        $routes->post('policy-update', 'AdminSettingController::policy_update', ['as' => 'setting.policy-update']);

        $routes->get('logo', 'AdminSettingController::logo', ['as' => 'setting.logo']);
        $routes->post('logo-update', 'AdminSettingController::logo_update', ['as' => 'setting.logo-update']);        
    });

    $routes->group('script', function($routes) {
        $routes->get('/', 'AdminScriptController::index', ['as' => 'script.index']);
        $routes->post('update', 'AdminScriptController::update', ['as' => 'script.update']);
    });

    $routes->group('meta-tag', function($routes) {
        $routes->get('/', 'AdminMetaTagController::index', ['as' => 'meta-tag.list']);
        $routes->get('load_data', 'AdminMetaTagController::load_data', ['as' => 'meta-tag.load_data']);
        $routes->get('add', 'AdminMetaTagController::add', ['as' => 'meta-tag.add']);
        $routes->get('edit/(:any)?', 'AdminMetaTagController::edit/$1', ['as' => 'meta-tag.edit']);
        $routes->get('view/(:any)', 'AdminMetaTagController::view/$1', ['as' => 'meta-tag.view']);
        $routes->post('update', 'AdminMetaTagController::update', ['as' => 'meta-tag.update']);
        $routes->post('delete/(:any)', 'AdminMetaTagController::delete/$1', ['as' => 'meta-tag.delete']);
        $routes->post('block_unblock/(:any)', 'AdminMetaTagController::block_unblock/$1', ['as' => 'meta-tag.block_unblock']);
    });


    $routes->group('state', function($routes) {
        $routes->get('/', 'AdminStateController::index', ['as' => 'state.list']);
        $routes->get('load_data', 'AdminStateController::load_data', ['as' => 'state.load_data']);
        $routes->get('add', 'AdminStateController::add', ['as' => 'state.add']);
        $routes->get('edit/(:any)?', 'AdminStateController::edit/$1', ['as' => 'state.edit']);
        $routes->get('view/(:any)', 'AdminStateController::view/$1', ['as' => 'state.view']);
        $routes->post('update', 'AdminStateController::update', ['as' => 'state.update']);
        $routes->post('delete/(:any)', 'AdminStateController::delete/$1', ['as' => 'state.delete']);
        $routes->post('block_unblock/(:any)', 'AdminStateController::block_unblock/$1', ['as' => 'state.block_unblock']);
    });

    $routes->group('city', function($routes) {
        $routes->get('/', 'AdminCityController::index', ['as' => 'city.list']);
        $routes->get('load_data', 'AdminCityController::load_data', ['as' => 'city.load_data']);
        $routes->get('add', 'AdminCityController::add', ['as' => 'city.add']);
        $routes->get('edit/(:any)?', 'AdminCityController::edit/$1', ['as' => 'city.edit']);
        $routes->get('view/(:any)', 'AdminCityController::view/$1', ['as' => 'city.view']);
        $routes->post('update', 'AdminCityController::update', ['as' => 'city.update']);
        $routes->post('delete/(:any)', 'AdminCityController::delete/$1', ['as' => 'city.delete']);
        $routes->post('block_unblock/(:any)', 'AdminCityController::block_unblock/$1', ['as' => 'city.block_unblock']);
    });

    $routes->group('admin-user', function($routes) {
        $routes->get('/', 'AdminUserController::index', ['as' => 'admin-user.list']);
        $routes->get('load_data', 'AdminUserController::load_data', ['as' => 'admin-user.load_data']);
        $routes->get('add', 'AdminUserController::add', ['as' => 'admin-user.add']);
        $routes->get('edit/(:any)?', 'AdminUserController::edit/$1', ['as' => 'admin-user.edit']);
        $routes->get('view/(:any)', 'AdminUserController::view/$1', ['as' => 'admin-user.view']);
        $routes->post('update', 'AdminUserController::update', ['as' => 'admin-user.update']);
        $routes->post('delete/(:any)', 'AdminUserController::delete/$1', ['as' => 'admin-user.delete']);
        $routes->post('block_unblock/(:any)', 'AdminUserController::block_unblock/$1', ['as' => 'admin-user.block_unblock']);
    });

    $routes->group('showroom', function($routes) {
        $routes->get('/', 'AdminShowroomController::index', ['as' => 'showroom.list']);
        $routes->get('load_data', 'AdminShowroomController::load_data', ['as' => 'showroom.load_data']);
        $routes->get('add', 'AdminShowroomController::add', ['as' => 'showroom.add']);
        $routes->get('edit/(:any)?', 'AdminShowroomController::edit/$1', ['as' => 'showroom.edit']);
        $routes->get('view/(:any)', 'AdminShowroomController::view/$1', ['as' => 'showroom.view']);
        $routes->post('update', 'AdminShowroomController::update', ['as' => 'showroom.update']);
        $routes->post('delete/(:any)', 'AdminShowroomController::delete/$1', ['as' => 'showroom.delete']);
        $routes->post('block_unblock/(:any)', 'AdminShowroomController::block_unblock/$1', ['as' => 'showroom.block_unblock']);
    });

    $routes->group('transaction', function($routes) {
        $routes->get('/', 'AdminTransactionController::index', ['as' => 'transaction.list']);
        $routes->get('load_data', 'AdminTransactionController::load_data', ['as' => 'transaction.load_data']);
        $routes->get('add', 'AdminTransactionController::add', ['as' => 'transaction.add']);
        $routes->get('edit/(:any)?', 'AdminTransactionController::edit/$1', ['as' => 'transaction.edit']);
        $routes->get('view/(:any)', 'AdminTransactionController::view/$1', ['as' => 'transaction.view']);
        $routes->post('update', 'AdminTransactionController::update', ['as' => 'transaction.update']);
        $routes->post('delete/(:any)', 'AdminTransactionController::delete/$1', ['as' => 'transaction.delete']);
        $routes->post('block_unblock/(:any)', 'AdminTransactionController::block_unblock/$1', ['as' => 'transaction.block_unblock']);
    });

    $routes->group('vendor-package', function($routes) {
        $routes->get('/', 'AdminVendorPackageController::index', ['as' => 'vendor-package.list']);
        $routes->get('load_data', 'AdminVendorPackageController::load_data', ['as' => 'vendor-package.load_data']);
        $routes->get('add', 'AdminVendorPackageController::add', ['as' => 'vendor-package.add']);
        $routes->get('edit/(:any)?', 'AdminVendorPackageController::edit/$1', ['as' => 'vendor-package.edit']);
        $routes->get('view/(:any)', 'AdminVendorPackageController::view/$1', ['as' => 'vendor-package.view']);
        $routes->post('update', 'AdminVendorPackageController::update', ['as' => 'vendor-package.update']);
        $routes->post('delete/(:any)', 'AdminVendorPackageController::delete/$1', ['as' => 'vendor-package.delete']);
        $routes->post('block_unblock/(:any)', 'AdminVendorPackageController::block_unblock/$1', ['as' => 'vendor-package.block_unblock']);
    });

    $routes->group('banner', function($routes) {
        $routes->get('/', 'AdminBannerController::index', ['as' => 'banner.list']);
        $routes->get('load_data', 'AdminBannerController::load_data', ['as' => 'banner.load_data']);
        $routes->get('add', 'AdminBannerController::add', ['as' => 'banner.add']);
        $routes->get('edit/(:any)?', 'AdminBannerController::edit/$1', ['as' => 'banner.edit']);
        $routes->get('view/(:any)', 'AdminBannerController::view/$1', ['as' => 'banner.view']);
        $routes->post('update', 'AdminBannerController::update', ['as' => 'banner.update']);
        $routes->post('delete/(:any)', 'AdminBannerController::delete/$1', ['as' => 'banner.delete']);
        $routes->post('block_unblock/(:any)', 'AdminBannerController::block_unblock/$1', ['as' => 'banner.block_unblock']);
    });

    $routes->group('package', function($routes) {
        $routes->get('/', 'AdminPackageController::index', ['as' => 'package.list']);
        $routes->get('load_data', 'AdminPackageController::load_data', ['as' => 'package.load_data']);
        $routes->get('add', 'AdminPackageController::add', ['as' => 'package.add']);
        $routes->get('edit/(:any)?', 'AdminPackageController::edit/$1', ['as' => 'package.edit']);
        $routes->get('view/(:any)', 'AdminPackageController::view/$1', ['as' => 'package.view']);
        $routes->post('update', 'AdminPackageController::update', ['as' => 'package.update']);
        $routes->post('delete/(:any)', 'AdminPackageController::delete/$1', ['as' => 'package.delete']);
        $routes->post('block_unblock/(:any)', 'AdminPackageController::block_unblock/$1', ['as' => 'package.block_unblock']);
    });


    $routes->group('main-menu', function($routes) {
        $routes->get('/', 'AdminMainMenuController::index', ['as' => 'main-menu.list']);
        $routes->get('load_data', 'AdminMainMenuController::load_data', ['as' => 'main-menu.load_data']);
        $routes->get('add', 'AdminMainMenuController::add', ['as' => 'main-menu.add']);
        $routes->get('edit/(:any)?', 'AdminMainMenuController::edit/$1', ['as' => 'main-menu.edit']);
        $routes->get('view/(:any)', 'AdminMainMenuController::view/$1', ['as' => 'main-menu.view']);
        $routes->post('update', 'AdminMainMenuController::update', ['as' => 'main-menu.update']);
        $routes->post('delete/(:any)', 'AdminMainMenuController::delete/$1', ['as' => 'main-menu.delete']);
        $routes->post('block_unblock/(:any)', 'AdminMainMenuController::block_unblock/$1', ['as' => 'main-menu.block_unblock']);
    });

    $routes->group('menu-category', function($routes) {
        $routes->get('/', 'AdminMenuCategoryController::index', ['as' => 'menu-category.list']);
        $routes->get('load_data', 'AdminMenuCategoryController::load_data', ['as' => 'menu-category.load_data']);
        $routes->get('add', 'AdminMenuCategoryController::add', ['as' => 'menu-category.add']);
        $routes->get('edit/(:any)?', 'AdminMenuCategoryController::edit/$1', ['as' => 'menu-category.edit']);
        $routes->get('view/(:any)', 'AdminMenuCategoryController::view/$1', ['as' => 'menu-category.view']);
        $routes->post('update', 'AdminMenuCategoryController::update', ['as' => 'menu-category.update']);
        $routes->post('delete/(:any)', 'AdminMenuCategoryController::delete/$1', ['as' => 'menu-category.delete']);
        $routes->post('block_unblock/(:any)', 'AdminMenuCategoryController::block_unblock/$1', ['as' => 'menu-category.block_unblock']);
    });






    $routes->group('color', function($routes) {
        $routes->get('/', 'AdminColorController::index', ['as' => 'color.list']);
        $routes->get('load_data', 'AdminColorController::load_data', ['as' => 'color.load_data']);
        $routes->get('add', 'AdminColorController::add', ['as' => 'color.add']);
        $routes->get('edit/(:any)?', 'AdminColorController::edit/$1', ['as' => 'color.edit']);
        $routes->post('update', 'AdminColorController::update', ['as' => 'color.update']);
        $routes->post('delete/(:any)', 'AdminColorController::delete/$1', ['as' => 'color.delete']);
        $routes->post('block_unblock/(:any)', 'AdminColorController::block_unblock/$1', ['as' => 'color.block_unblock']);
    });
    $routes->group('body-type', function($routes) {
        $routes->get('/', 'AdminBodyTypeController::index', ['as' => 'body-type.list']);
        $routes->get('load_data', 'AdminBodyTypeController::load_data', ['as' => 'body-type.load_data']);
        $routes->get('add', 'AdminBodyTypeController::add', ['as' => 'body-type.add']);
        $routes->get('edit/(:any)?', 'AdminBodyTypeController::edit/$1', ['as' => 'body-type.edit']);
        $routes->post('update', 'AdminBodyTypeController::update', ['as' => 'body-type.update']);
        $routes->post('delete/(:any)', 'AdminBodyTypeController::delete/$1', ['as' => 'body-type.delete']);
        $routes->post('block_unblock/(:any)', 'AdminBodyTypeController::block_unblock/$1', ['as' => 'body-type.block_unblock']);
    });
    $routes->group('top-speed', function($routes) {
        $routes->get('/', 'AdminTopSpeedController::index', ['as' => 'top-speed.list']);
        $routes->get('load_data', 'AdminTopSpeedController::load_data', ['as' => 'top-speed.load_data']);
        $routes->get('add', 'AdminTopSpeedController::add', ['as' => 'top-speed.add']);
        $routes->get('edit/(:any)?', 'AdminTopSpeedController::edit/$1', ['as' => 'top-speed.edit']);
        $routes->post('update', 'AdminTopSpeedController::update', ['as' => 'top-speed.update']);
        $routes->post('delete/(:any)', 'AdminTopSpeedController::delete/$1', ['as' => 'top-speed.delete']);
        $routes->post('block_unblock/(:any)', 'AdminTopSpeedController::block_unblock/$1', ['as' => 'top-speed.block_unblock']);
    });
    $routes->group('vehicle-type', function($routes) {
        $routes->get('/', 'AdminVehicleTypeController::index', ['as' => 'vehicle-type.list']);
        $routes->get('load_data', 'AdminVehicleTypeController::load_data', ['as' => 'vehicle-type.load_data']);
        $routes->get('add', 'AdminVehicleTypeController::add', ['as' => 'vehicle-type.add']);
        $routes->get('edit/(:any)?', 'AdminVehicleTypeController::edit/$1', ['as' => 'vehicle-type.edit']);
        $routes->post('update', 'AdminVehicleTypeController::update', ['as' => 'vehicle-type.update']);
        $routes->post('delete/(:any)', 'AdminVehicleTypeController::delete/$1', ['as' => 'vehicle-type.delete']);
        $routes->post('block_unblock/(:any)', 'AdminVehicleTypeController::block_unblock/$1', ['as' => 'vehicle-type.block_unblock']);
    });
    $routes->group('two-wheelers-range', function($routes) {
        $routes->get('/', 'AdminTwoWheelersRangeController::index', ['as' => 'two-wheelers-range.list']);
        $routes->get('load_data', 'AdminTwoWheelersRangeController::load_data', ['as' => 'two-wheelers-range.load_data']);
        $routes->get('add', 'AdminTwoWheelersRangeController::add', ['as' => 'two-wheelers-range.add']);
        $routes->get('edit/(:any)?', 'AdminTwoWheelersRangeController::edit/$1', ['as' => 'two-wheelers-range.edit']);
        $routes->post('update', 'AdminTwoWheelersRangeController::update', ['as' => 'two-wheelers-range.update']);
        $routes->post('delete/(:any)', 'AdminTwoWheelersRangeController::delete/$1', ['as' => 'two-wheelers-range.delete']);
        $routes->post('block_unblock/(:any)', 'AdminTwoWheelersRangeController::block_unblock/$1', ['as' => 'two-wheelers-range.block_unblock']);
    });
    $routes->group('charging-time', function($routes) {
        $routes->get('/', 'AdminChargingTimeController::index', ['as' => 'charging-time.list']);
        $routes->get('load_data', 'AdminChargingTimeController::load_data', ['as' => 'charging-time.load_data']);
        $routes->get('add', 'AdminChargingTimeController::add', ['as' => 'charging-time.add']);
        $routes->get('edit/(:any)?', 'AdminChargingTimeController::edit/$1', ['as' => 'charging-time.edit']);
        $routes->post('update', 'AdminChargingTimeController::update', ['as' => 'charging-time.update']);
        $routes->post('delete/(:any)', 'AdminChargingTimeController::delete/$1', ['as' => 'charging-time.delete']);
        $routes->post('block_unblock/(:any)', 'AdminChargingTimeController::block_unblock/$1', ['as' => 'charging-time.block_unblock']);
    });
    $routes->group('features', function($routes) {
        $routes->get('/', 'AdminFeaturesController::index', ['as' => 'features.list']);
        $routes->get('load_data', 'AdminFeaturesController::load_data', ['as' => 'features.load_data']);
        $routes->get('add', 'AdminFeaturesController::add', ['as' => 'features.add']);
        $routes->get('edit/(:any)?', 'AdminFeaturesController::edit/$1', ['as' => 'features.edit']);
        $routes->post('update', 'AdminFeaturesController::update', ['as' => 'features.update']);
        $routes->post('delete/(:any)', 'AdminFeaturesController::delete/$1', ['as' => 'features.delete']);
        $routes->post('block_unblock/(:any)', 'AdminFeaturesController::block_unblock/$1', ['as' => 'features.block_unblock']);
    });

    $routes->group('product', function($routes) {
        $routes->get('/', 'AdminProductController::index', ['as' => 'product.list']);
        $routes->get('load_data', 'AdminProductController::load_data', ['as' => 'product.load_data']);
        $routes->get('add', 'AdminProductController::add', ['as' => 'product.add']);
        $routes->get('edit/(:any)?', 'AdminProductController::edit/$1', ['as' => 'product.edit']);
        $routes->get('view/(:any)', 'AdminProductController::view/$1', ['as' => 'product.view']);
        $routes->post('update', 'AdminProductController::update', ['as' => 'product.update']);
        $routes->post('delete/(:any)', 'AdminProductController::delete/$1', ['as' => 'product.delete']);
        $routes->post('block_unblock/(:any)', 'AdminProductController::block_unblock/$1', ['as' => 'product.block_unblock']);
    });

    



    $routes->group('blog-category', function($routes) {
        $routes->get('/', 'AdminBlogCategoryController::index', ['as' => 'blog-category.list']);
        $routes->get('load_data', 'AdminBlogCategoryController::load_data', ['as' => 'blog-category.load_data']);
        $routes->get('add', 'AdminBlogCategoryController::add', ['as' => 'blog-category.add']);
        $routes->get('edit/(:any)?', 'AdminBlogCategoryController::edit/$1', ['as' => 'blog-category.edit']);
        $routes->get('view/(:any)', 'AdminBlogCategoryController::view/$1', ['as' => 'blog-category.view']);
        $routes->post('update', 'AdminBlogCategoryController::update', ['as' => 'blog-category.update']);
        $routes->post('delete/(:any)', 'AdminBlogCategoryController::delete/$1', ['as' => 'blog-category.delete']);
        $routes->post('block_unblock/(:any)', 'AdminBlogCategoryController::block_unblock/$1', ['as' => 'blog-category.block_unblock']);
    });
    $routes->group('blog-sub-category', function($routes) {
        $routes->get('/', 'AdminBlogSubCategoryController::index', ['as' => 'blog-sub-category.list']);
        $routes->get('load_data', 'AdminBlogSubCategoryController::load_data', ['as' => 'blog-sub-category.load_data']);
        $routes->get('add', 'AdminBlogSubCategoryController::add', ['as' => 'blog-sub-category.add']);
        $routes->get('edit/(:any)?', 'AdminBlogSubCategoryController::edit/$1', ['as' => 'blog-sub-category.edit']);
        $routes->get('view/(:any)', 'AdminBlogSubCategoryController::view/$1', ['as' => 'blog-sub-category.view']);
        $routes->post('update', 'AdminBlogSubCategoryController::update', ['as' => 'blog-sub-category.update']);
        $routes->post('delete/(:any)', 'AdminBlogSubCategoryController::delete/$1', ['as' => 'blog-sub-category.delete']);
        $routes->post('block_unblock/(:any)', 'AdminBlogSubCategoryController::block_unblock/$1', ['as' => 'blog-sub-category.block_unblock']);
    });
    $routes->group('blog', function($routes) {
        $routes->get('/', 'AdminBlogController::index', ['as' => 'blog.list']);
        $routes->get('load_data', 'AdminBlogController::load_data', ['as' => 'blog.load_data']);
        $routes->get('add', 'AdminBlogController::add', ['as' => 'blog.add']);
        $routes->get('edit/(:any)?', 'AdminBlogController::edit/$1', ['as' => 'blog.edit']);
        $routes->get('view/(:any)', 'AdminBlogController::view/$1', ['as' => 'blog.view']);
        $routes->post('update', 'AdminBlogController::update', ['as' => 'blog.update']);
        $routes->post('delete/(:any)', 'AdminBlogController::delete/$1', ['as' => 'blog.delete']);
        $routes->post('block_unblock/(:any)', 'AdminBlogController::block_unblock/$1', ['as' => 'blog.block_unblock']);
    });


    
    



    $routes->group('client-logo', function($routes) {
        $routes->get('/', 'AdminClientLogoController::index', ['as' => 'client-logo.list']);
        $routes->get('load_data', 'AdminClientLogoController::load_data', ['as' => 'client-logo.load_data']);
        $routes->get('add', 'AdminClientLogoController::add', ['as' => 'client-logo.add']);
        $routes->get('edit/(:any)?', 'AdminClientLogoController::edit/$1', ['as' => 'client-logo.edit']);
        $routes->get('view/(:any)', 'AdminClientLogoController::view/$1', ['as' => 'client-logo.view']);
        $routes->post('update', 'AdminClientLogoController::update', ['as' => 'client-logo.update']);
        $routes->post('delete/(:any)', 'AdminClientLogoController::delete/$1', ['as' => 'client-logo.delete']);
        $routes->post('block_unblock/(:any)', 'AdminClientLogoController::block_unblock/$1', ['as' => 'client-logo.block_unblock']);
    });



    /*enquiry statrt*/

      

        $routes->group('contact-enquiry', function($routes) {
            $routes->get('/', 'AdminContactEnquiryController::index', ['as' => 'contact-enquiry.list']);
            $routes->get('load_data', 'AdminContactEnquiryController::load_data', ['as' => 'contact-enquiry.load_data']);
            $routes->get('view/(:any)', 'AdminContactEnquiryController::view/$1', ['as' => 'contact-enquiry.view']);
            $routes->post('delete/(:any)', 'AdminContactEnquiryController::delete/$1', ['as' => 'contact-enquiry.delete']);
        });

        $routes->group('lead-enquiry', function($routes) {
            $routes->get('/', 'AdminLeadEnquiryController::index', ['as' => 'lead-enquiry.list']);
            $routes->get('load_data', 'AdminLeadEnquiryController::load_data', ['as' => 'lead-enquiry.load_data']);
            $routes->post('transfer_now', 'AdminLeadEnquiryController::transfer_now', ['as' => 'lead-enquiry.transfer_now']);
            $routes->get('view/(:any)', 'AdminLeadEnquiryController::view/$1', ['as' => 'lead-enquiry.view']);
            $routes->post('delete/(:any)', 'AdminLeadEnquiryController::delete/$1', ['as' => 'lead-enquiry.delete']);
        });

        $routes->group('booking-enquiry', function($routes) {
            $routes->get('/', 'AdminBookingEnquiryController::index', ['as' => 'booking-enquiry.list']);
            $routes->get('load_data', 'AdminBookingEnquiryController::load_data', ['as' => 'booking-enquiry.load_data']);
            $routes->post('transfer_now', 'AdminBookingEnquiryController::transfer_now', ['as' => 'booking-enquiry.transfer_now']);
            $routes->get('view/(:any)', 'AdminBookingEnquiryController::view/$1', ['as' => 'booking-enquiry.view']);
            $routes->post('delete/(:any)', 'AdminBookingEnquiryController::delete/$1', ['as' => 'booking-enquiry.delete']);
        });

        $routes->group('blog-enquiry', function($routes) {
            $routes->get('/', 'AdminBlogEnquiryController::index', ['as' => 'blog-enquiry.list']);
            $routes->get('load_data', 'AdminBlogEnquiryController::load_data', ['as' => 'blog-enquiry.load_data']);
            $routes->get('view/(:any)', 'AdminBlogEnquiryController::view/$1', ['as' => 'blog-enquiry.view']);
            $routes->post('delete/(:any)', 'AdminBlogEnquiryController::delete/$1', ['as' => 'blog-enquiry.delete']);
        });

    /*enquiry end*/

});

