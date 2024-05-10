<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

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
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        $this->user = new \App\Models\UserModel();
        $this->diagnosa = new \App\Models\DiagnosaModel();
        $this->pelanggaran = new \App\Models\PelanggaranModel();
        $this->jenisKs = new \App\Models\JenisKekerasanSeksualModel();
        $this->sanksiAdm = new \App\Models\SanksiAdministratifModel();
        $this->basisAturanJenisKs = new \App\Models\BasisAturanJenisKsModel();
        $this->detailBasisAturanJenisKs = new \App\Models\DetailBasisAturanJenisKsModel();
        $this->basisAturanSanksi = new \App\Models\BasisAturanSanksiModel();
        $this->detailBasisAturanSanksi = new \App\Models\DetailBasisAturanSanksiModel();

        $this->konsultasiJenisKs = new \App\Models\KonsultasiJenisKsModel();
        $this->detailKonsultasiJenisKs = new \App\Models\DetailKonsultasiJenisKsModel();

        $this->konsultasiSanksiAdministratif = new \App\Models\KonsultasiSanksiAdministratifModel();
        $this->detailKonsultasiSanksiAdministratif = new \App\Models\DetailKonsultasiSanksiAdministrasiModel();

        $this->laporKonsultasiJenisKs = new \App\Models\LaporKonsultasiJenisKsModel();
        
    }
}
