<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Repositories\MenusRepository;
use App\Repositories\PortfoliosRepository;
use App\Repositories\ShopRepository;
use App\Repositories\SlidersRepository;
use Illuminate\Http\Request;

class IndexController extends SiteController
{

    public function __construct(SlidersRepository $s_rep, PortfoliosRepository $p_rep, ShopRepository $shop_rep)
    {
        parent::__construct(new MenusRepository(new Menu));
        $this->template = env('THEME').'.index';
        $this->s_rep = $s_rep;
        $this->p_rep = $p_rep;
        $this->shop_rep = $shop_rep;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderItem = $this->getSliders();
        $portfolios = $this->getPortfolio();
        $shopitems = $this->getShopPhotos();
        $slider = view(env('THEME').'.slider')->with('sliders',$sliderItem)->render();
        $this->vars = array_add($this->vars,'slider',$slider);
        $content = view(env('THEME').'.portfolio')->with('portfolios',$portfolios)->render();
        $this->vars = array_add($this->vars,'content',$content);
        $this->title ='Home page';
        $shopPhotos = view(env('THEME').'.shop_items')->with('shopitems',$shopitems)->render();
        $this->vars = array_add($this->vars,'shopPhotos',$shopPhotos);

        return $this->renderOutput();
    }

    public function getSliders(){
        $sliders = $this->s_rep->get();
        return $sliders;
    }

    protected function getPortfolio(){
        $portfolio = $this->p_rep->get();
        return $portfolio;
    }

    protected function getShopPhotos(){
        $shopItems = $this->shop_rep->get();
        return $shopItems;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
