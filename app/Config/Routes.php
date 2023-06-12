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
$routes->get('/', 'home\Home::index');

//PAGES 1 ---------------------------------------------------
$routes->get('/badan-permusyawaratam-desa', 'Pages\Page1::index/bpd-kmz-165');
$routes->get('/lembaga-pemberdayaan-desa', 'Pages\Page1::index/lpmdes-kmz-165');
$routes->get('/pembinaan-kesejahteraan-keluarga', 'Pages\Page1::index/pkk-kmz-165');
$routes->get('/karang-taruna', 'Pages\Page1::index/kartan-kmz-165');

//PAGES 2 ---------------------------------------------------
$routes->get('/struktur-pemerintahan', 'Pages\Page2::index');
$routes->get('/struktur-pemerintahan/(:any)/(:any)/', 'Pages\Page2::detail/$1/$2');

//More Page---------------------------------------------------
$routes->get('/galeri-desa', 'Pages\Page3::index');
$routes->get('/data-wilayah', 'Pages\Page4::index');
$routes->get('/kontak-desa', 'Pages\Page5::index');
$routes->get('/visi-misi-desa', 'Pages\Page6::index');

//Fitur Utama
$routes->get('/sdgs-desa', 'Fiturutama\Fitur1::index');
$routes->get('/keuangan-dasa', 'Fiturutama\Fitur2::index');
$routes->get('/status-idm', 'Fiturutama\Fitur3::index');

//Proses---------------------------------------------------
$routes->post('/post-layanan-pengaduan', 'Proses\Layananaduan::add');
$routes->post('/layanan-pengaduan/getTunggal', 'Proses\Layananaduan::getAjaxTunggal');


//BLOG-----------------------------------------------------
$routes->get('/potensi-desa', 'Blog\index::khusus/potensi-desa');
$routes->get('/sejarah-desa', 'Blog\index::khusus/sejarah-desa');
$routes->get('/profil-wilayah', 'Blog\index::khusus/profil-wilayah');
$routes->get('/(:any)/(:num)', 'Blog\index::index/$1/$2');


//ADMIN-----------------------------------------------------
$routes->get('/admindes', 'Admindes\Admindes::index');

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
