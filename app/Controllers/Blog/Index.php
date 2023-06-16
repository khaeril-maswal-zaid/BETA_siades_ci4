<?php

namespace App\Controllers\Blog;

use App\Controllers\BaseController;

use App\Models\ArtikelModel;
use App\Models\PersonilDesaModel;

class Index extends BaseController
{
    protected $templatelayaout;
    protected $artikelmodel;
    protected $personildesa;

    public function __construct()
    {
        $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
        $this->artikelmodel = new ArtikelModel();
        $this->personildesa = new PersonilDesaModel;
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

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => $artikel['judul'] . ' | Desa ' . DESA,
            'metakeywords' =>  $artikel['judul'],
            'metadescription' => $artikel['description'],

            'dataartikel' => $artikel,

            'personildesa' => $this->personildesa->personilAll('apdes-kmz-165')
        ];

        return view('blog/index', $data);
    }

    public function khusus($slug)
    {
        $artikel = $this->artikelmodel->where('slug', $slug)->first();

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => $artikel['judul'] . ' | Desa ' . DESA,
            'metakeywords' =>  $artikel['judul'],
            'metadescription' => $artikel['description'],

            'dataartikel' => $artikel,

            'personildesa' => $this->personildesa->personilAll('apdes-kmz-165')
        ];

        return view('blog/index', $data);
    }
}
