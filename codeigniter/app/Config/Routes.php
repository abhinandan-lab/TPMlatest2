<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// starting from Register to profiles

######################################### rotes to work on #######################################################

// Home/settings
// Home/editprofilr
// Home/partner-prefernce

// Inbox/sent-request
// Inbox/received-request
// Inbox/profilrs-notlikes
// Inbox/rejected-by-others
// Inbox

// profiles

// premiums

######################################### end of rotes to work on #######################################################


$routes->get('/', 'Home::register');
$routes->post('register', 'Home::register');
 
$routes->get('setemail', 'Home::setEmail');
$routes->post('setemail', 'Home::setEmail'); 

$routes->get('login', 'Home::loginUser');
$routes->post('login', 'Home::loginUser'); 

$routes->get('verifyemail', 'Home::verifyEmail');
$routes->post('verifyemail', 'Home::verifyEmail'); 

$routes->get('editemail/(:num)', 'Home::editEmail/$1');

$routes->get('sendotpagain/(:num)', 'Home::sendOtpAgain/$1');

$routes->get('otplogin1/', 'Home::otpLogin');
$routes->post('otplogin1/', 'Home::otpLogin');

$routes->get('otplogin2/', 'Home::otpLogin2');
$routes->post('otplogin2/', 'Home::otpLogin2');

// test
$routes->get('test', 'PersonalInfoController::test');
 

// states, city api
$routes->get('getstates/(:num)', 'PersonalInfoController::getStatesApi/$1');
$routes->get('getcities/(:num)', 'PersonalInfoController::getCitiesApi/$1');


$routes->group('', ['filter' => 'userfilter'], function ($routes) {
    
    // personal information
    $routes->get('peinfo1/(:num)', 'PersonalInfoController::peInfoOne/$1');
    $routes->post('peinfo1/(:num)', 'PersonalInfoController::peInfoOne/$1');
    
    $routes->get('peinfo2/(:num)', 'PersonalInfoController::peInfoTwo/$1');
    $routes->post('peinfo2/(:num)', 'PersonalInfoController::peInfoTwo/$1');
    
    $routes->get('peinfo3/(:num)', 'PersonalInfoController::peInfoThree/$1');
    $routes->post('peinfo3/(:num)', 'PersonalInfoController::peInfoThree/$1');
    
    $routes->get('peinfo4/(:num)', 'PersonalInfoController::peInfoFour/$1');
    $routes->post('peinfo4/(:num)', 'PersonalInfoController::peInfoFour/$1');
    // profiles 
});

 

$routes->group('', ['filter' => 'profilefilter'], function ($routes) { 

    // render images which are need to be secured
    $routes->match(['get', 'post'], 'imagerender/(:segment)', 'RenderImage::index/$1');

    $routes->get('profiles', 'ProfileController::index');
    $routes->get('premiums', 'ProfileController::premiums');
    $routes->get('premiums', 'ProfileController::premiums');
    $routes->get('home', 'UserHome::index');
    $routes->get('home/edit-profile', 'UserHome::editProfile');
    $routes->get('home/partner-preference', 'UserHome::editPartnerPreference');
    

});


$routes->get('test2', 'ProfileController::test2'); 


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
