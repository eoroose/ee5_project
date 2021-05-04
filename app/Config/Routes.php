<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\Users;

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
$routes->setDefaultController('Users');
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
$routes->get ('/', 'Users::index',['filter'=>'noauth']);
$routes->get('/screensaver', 'Screensaver::index');
$routes->get('/logout' ,'Users::logout');
$routes->get('/dashboard','Dashboard::index', ['filter'=>'auth']);
$routes->match(['get','post'],'/register','Users::register',['filter'=>'auth']);
$routes->get('/week','Users::getAvatars');
$routes->match(['get','post'],'tasks',"tasks::index",['filter'=>'auth']);
$routes->match(['get','post'],'note-progress',"tasks::note_progress",['filter'=>'auth']);
$routes->match(['get','post'],'quote',"quote::index",['filter'=>'auth']);
$routes->match(['get','post'],'agenda',"AgendaController::index");
$routes->match(['get','post'],'journal',"JournalController::index");
$routes->match(['get','post'],'profile',"ProfileController::index");
$routes->match(['get','post'],'changePassword','ProfileController::changePassword',['filter'=>'auth']);
$routes->match(['get','post'],'progress','progress::index',['filter'=>'auth']);
$routes->match(['get','post'],'chore','choreController::index',['filter'=>'auth']);
$routes->match(['get','post'],'users','UsersController::index',['filter'=>'auth']);
$routes->match(['get','post'],'inhabitants','UsersController::inhabitantsPage',['filter'=>'auth']);
$routes->match(['get','post'],'celebration','CelebrationController::index',['filter'=>'auth']);
$routes->match(['get','post'],'backup','BackupController::index',['filter'=>'auth']);
$routes->match(['get','post'],'doctors','DoctorsController::index',['filter'=>'auth']);

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
