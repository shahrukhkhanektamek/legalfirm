<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



if (file_exists(APPPATH . 'Config/Routes/WebRoutes.php')) {
    require APPPATH . 'Config/Routes/WebRoutes.php';
}

if (file_exists(APPPATH . 'Config/Routes/AdminRoutes.php')) {
    require APPPATH . 'Config/Routes/AdminRoutes.php';
}

if (file_exists(APPPATH . 'Config/Routes/UserRoutes.php')) {
    require APPPATH . 'Config/Routes/UserRoutes.php';
}
if (file_exists(APPPATH . 'Config/Routes/AdvocateRoutes.php')) {
    require APPPATH . 'Config/Routes/AdvocateRoutes.php';
}
if (file_exists(APPPATH . 'Config/Routes/AdviserRoutes.php')) {
    require APPPATH . 'Config/Routes/AdviserRoutes.php';
}
if (file_exists(APPPATH . 'Config/Routes/CaRoutes.php')) {
    require APPPATH . 'Config/Routes/CaRoutes.php';
}





if (file_exists(APPPATH . 'Config/Routes/AuthRoutes.php')) {
    require APPPATH . 'Config/Routes/AuthRoutes.php';
}

if (file_exists(APPPATH . 'Config/Routes/PaymentRoutes.php')) {
    require APPPATH . 'Config/Routes/PaymentRoutes.php';
}