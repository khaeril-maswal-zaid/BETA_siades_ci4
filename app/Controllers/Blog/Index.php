<?php

namespace App\Controllers\Blog;

use App\Controllers\BaseController;
use App\Models\AdminsModel;
use App\Models\ArtikelModel;
use App\Models\CountViewersModel;
use App\Models\PersonilDesaModel;

class Index extends BaseController
{
    protected $templatelayaout;
    protected $artikelmodel;
    protected $personildesa;
    protected $countviewersmodel;

    public function __construct()
    {
        $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
        $this->artikelmodel = new ArtikelModel();
        $this->personildesa = new PersonilDesaModel;
        $this->countviewersmodel = new CountViewersModel();
    }

    public function index($slug, $time)
    {
        $artikel = $this->artikelmodel->orlike('slug', $slug);
        $artikel = $this->artikelmodel->orlike('time', $time);
        $artikel = $artikel->first();
        // dd($artikel);

        if (!isset($artikel)) {
            return view('errors/html/error_404');
        }

        $admin = new AdminsModel();
        $imageAdmin = $admin->getOne('image', 'fullname', $artikel['oleh']);

        $viewers = $this->countviewersmodel->getDataByPage($artikel['id']);

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => $artikel['judul'] . ' | Desa ' . DESA,
            'metakeywords' =>  $artikel['judul'],
            'metadescription' => $artikel['description'],

            'dataartikel' => $artikel,
            'fotoadmin' => $imageAdmin,
            'personildesa' => $this->personildesa->personilAll('strukturdesa-kmz-165'),
            'viewers' => $viewers + 50
        ];

        $this->countviewersmodel->addViewers([$artikel['id']]);
        return view('blog/index', $data);
    }

    public function khusus($slug)
    {
        // $judul = str_replace("-", " ", $slug);
        // $judul = ucwords($judul);
        // $artikel = $this->artikelmodel->where('judul', $judul)->first();

        $artikel = $this->artikelmodel->where('slug', $slug)->first();

        if (!isset($artikel)) {
            return view('errors/html/error_404');
        }

        $admin = new AdminsModel();
        $imageAdmin = $admin->getOne('image', 'fullname', $artikel['oleh']);

        $viewers = $this->countviewersmodel->getDataByPage($artikel['id']);

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => $artikel['judul'] . ' | Desa ' . DESA,
            'metakeywords' =>  $artikel['judul'],
            'metadescription' => $artikel['description'],

            'dataartikel' => $artikel,
            'fotoadmin' => $imageAdmin,
            'personildesa' => $this->personildesa->personilAll('strukturdesa-kmz-165'),
            'viewers' => $viewers + 50
        ];

        $this->countviewersmodel->addViewers([$artikel['id']]);
        return view('blog/index', $data);
    }
}
