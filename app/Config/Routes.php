<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

//routes utente
$routes->get('/signup', 'Signup::index');
$routes->post('/signup', 'Signup::insertUtente');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::login');
$routes->get('/logout', 'Login::logout');
$routes->post('/login/resetPassword', "Login::resetPassword");

//routes per areaRiservata
$routes->get('/areaRiservata', 'Profilo::index');
$routes->post('/areaRiservata', 'Profilo::aggiornaProfilo');
$routes->post('/areaRiservata/inserisciAnnuncio', 'Profilo::inserisciAnnuncio');
$routes->get('/areaRiservata/eliminaAnnuncio/(:num)', 'Profilo::eliminaAnnuncio/$1');
$routes->get('/areaRiservata/confermaCandidatura/(:num)/(:alphanum)', 'Profilo::confermaCandidatura/$1/$2');
$routes->post('/areaRiservata/inviaMessaggio', 'Profilo::inviaMessaggio');
$routes->post('/areaRiservata/recensisci', 'Profilo::recensisci');

//routes per professionistiList
$routes->get('/professionistiList', 'ListaProfessionisti::index');
$routes->post('/professionistiList', 'ListaProfessionisti::filtraLista');

//routes per professionista
$routes->get('/professionisti', 'Professionisti::index');
$routes->get('/professionisti/login', 'Professionisti::login');
$routes->post('/professionisti/login', 'Professionisti::logProfessionsita');
$routes->get('/professionisti/signup', 'Professionisti::signup');
$routes->post('/professionisti/signup', 'Professionisti::insertProfessionista');
$routes->get('/professionisti/logout', 'Professionisti::logout');
$routes->get('/professionisti/areaRiservata', 'Professionisti::areaRiservata');
$routes->post('/professionisti/areaRiservata/premium', 'Professionisti::premium');
$routes->post('/professionisti/areaRiservata', 'Professionisti::aggiornaProfilo');
$routes->get('/professionisti/interventiDisponibili', 'Professionisti::interventiDisponibili');
$routes->get('/professionisti/candidati/(:alphanum)', 'Professionisti::candidati/$1');
$routes->post('/professionisti/inviaMessaggio', 'Professionisti::inviaMessaggio');
$routes->get('/professionisti/eliminaCandidatura/(:num)', 'Professionisti::eliminaCandidatura/$1');
$routes->get('/professionisti/confermaCandidatura/(:num)', 'Professionisti::confermaCandidatura/$1');

//routes per admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/utenti', 'Admin::index');
$routes->get('/admin/login', 'Admin::login');
$routes->post('/admin/login', 'Admin::doLogin');
$routes->get('/admin/utenti', 'Admin::utenti');
$routes->get('/admin/bannaUtente/(:alphanum)', 'Admin::bannaUtente/$1');
$routes->get('/admin/professionisti', 'Admin::professionisti');
$routes->get('/admin/attivaProfessionista/(:alphanum)', 'Admin::attivaProfessionista/$1');