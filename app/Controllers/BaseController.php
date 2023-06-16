<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\DataDesaModel;
use App\Models\Page1Model;

/*** NAMA DESA ---------------------*/
define('DESA', 'Wakanda Raya');
define('KEC', 'Konoha Timur');
define('KAB', 'Londong Raya');
define('LENGKAP', 'Desa ' . DESA . ', Kec. ' . KEC . ', Kab. ' . KAB);
define('FULLENGKAP', 'Desa ' . DESA . ', Kecamatan ' . KEC . ', Kabupaten ' . KAB);
/***------------------------------------------ */


/*** UNTUK DATA DESA & LEMBAGA DI NAV HEADER ---------------------*/
$datadesamodel = new DataDesaModel();
$kategoridatadesa = $datadesamodel->select('slug')->distinct()->findAll();
define('KATEGORIDATADESA', $kategoridatadesa);

$lembagadesamodel = new Page1Model();
$lembagadesamodel->select(['namepage', 'nicknamepage'])->where('idGroup', '1');
$kategoridatadesa = $lembagadesamodel->select(['namepage', 'nicknamepage'])->where('slug !=', 'bpd-kmz-165')->findAll();
define('LEMABAGADESA', $kategoridatadesa);


/***---------------------*/


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['generateWhatsappLink'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
}
