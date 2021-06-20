<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('xmenapi/show_skills_by_superhero/(:segment)',                'XmenAPI::show_skills_by_superhero/$1');
$routes->get('xmenapi/delete_superheroskills/(:segment)',    'XmenAPI::delete_superheroskills/$1');
$routes->get('xmenapi/show_skills_not/(:segment)',    'XmenAPI::show_skills_not/$1');
$routes->get('xmenapi/get_superhero_groupby_gender',    'XmenAPI::get_superhero_groupby_gender');
$routes->get('xmenapi/kid_skills_prob/(:segment)/(:segment)',    'XmenAPI::kid_skills_prob/$1/$2');
$routes->get('xmenapi/show_all_skills',    'XmenAPI::show_all_skills');
$routes->get('xmenapi/show_skill/(:segment)',    'XmenAPI::show_skill/$1');


$routes->presenter('xmenapi');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
