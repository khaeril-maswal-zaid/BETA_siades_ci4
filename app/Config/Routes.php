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

//PAGES 4 DATA-----------------------------------------------
$routes->get('/data-desa/data-wilayah', 'Datadesa\index::index');
$routes->get('/data-desa/(:any)', 'Datadesa\index::Datadesa/$1');


//More Page---------------------------------------------------
$routes->get('/galeri-desa', 'Pages\Page3::index');
$routes->get('/kontak-desa', 'Pages\Page5::index');
$routes->get('/visi-misi-desa', 'Pages\Page6::index');
$routes->get('/layanan-pengaduan', 'Pages\Page7::index');

//Fitur Utama
$routes->get('/sdgs-desa', 'Fiturutama\Fitur1::index');
$routes->get('/keuangan-dasa', 'Fiturutama\Fitur2::index');
$routes->get('/status-idm', 'Fiturutama\Fitur3::index');

//Proses---------------------------------------------------
$routes->post('/post-layanan-pengaduan', 'Proses\Layananaduan::add');
$routes->post('/layanan-pengaduan/getTunggal', 'Proses\Layananaduan::getAjaxTunggal');

$routes->post('/adm-proses/blog', 'Proses\AdmBlog::save');


//BLOG-----------------------------------------------------
$routes->get('/potensi-desa', 'Blog\index::khusus/potensi-desa');
$routes->get('/sejarah-desa', 'Blog\index::khusus/sejarah-desa');
$routes->get('/profil-wilayah', 'Blog\index::khusus/profil-wilayah');
$routes->get('/(:any)/(:num)', 'Blog\index::index/$1/$2');


//ADMIN-----------------------------------------------------
$routes->get('/admindes', 'Admin\Index::index');
$routes->get('/admindes/kabar-desa', 'Admin\Index::blog');

$routes->get('/admindes/aduan-masyarakat', 'Admin\Index::aduan');

$routes->get('/admindes/profil-wilayah', 'Admin\Index::blogAdd/profil-wilayah/Update profil-wilayah/readonly');
$routes->get('/admindes/sejarah-desa', 'Admin\Index::blogAdd/sejarah-desa/Update sejarah-desa/readonly');
$routes->get('/admindes/potensi-desa', 'Admin\Index::blogAdd/potensi-desa/Update potensi-desa/readonly');

$routes->get('/admindes/kabar-desa/add', 'Admin\Index::blogAdd');
$routes->get('/admindes/kabar-desa/update/(:any)', 'Admin\Index::blogAdd/$1/Update $1');

$routes->get('/admindes/status-sdgs', 'Admin\Index::sdgs');
$routes->get('/admindes/status-idm', 'Admin\Index::idm');
$routes->get('/admindes/keuangan-desa', 'Admin\Index::keuangan');

$routes->get('/admindes/bpd', 'Admin\Index::lembaga/bpd-kmz-165');
$routes->get('/admindes/lpm', 'Admin\Index::lembaga/lpmdes-kmz-165');
$routes->get('/admindes/pkk', 'Admin\Index::lembaga/pkk-kmz-165');
$routes->get('/admindes/karang-taruna', 'Admin\Index::lembaga/kartan-kmz-165');

$routes->get('/admindes/data-desa/data-wilayah', 'Admin\index::dataWilayah');
$routes->get('/admindes/data-desa/(:any)', 'Admin\index::dataDesa/$1');

// Post Foto menggunakan Ajax
$routes->post('/postfotoajaxl/blog/(:any)', function ($judulberita) {
    $datafile = explode('.', $_FILES["file"]["name"]);
    $ext = end($datafile);
    $name = url_title($judulberita, '-', true) . '.' . $ext;

    move_uploaded_file($_FILES["file"]["tmp_name"], "img/blog/" . $name);

    echo '<img src="/img/blog/' . $name . '" class="img-thumbnail" />';
    echo '<input type="hidden" name="fotopost" value="' . $name . '">';
});

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
