<?php

namespace App\Http\Controllers\Shop;

use Menu;

class ShopController extends \App\Http\Controllers\Controller
{
    protected $prod_rep;
    protected $cat_rep;
    protected $m_rep;
    protected $s_rep;
    protected $p_rep;
    protected $shop_rep;
    protected $template;
    protected $title;
    protected $vars =[];
    protected $user;
    protected $content =FALSE;


    public function __construct()
    {

    }

    public function renderOutput(){
        $this->vars = array_add($this->vars,'title',$this->title);
        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.shop.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);
        if ($this->content){
            $this->vars = array_add($this->vars,'content',$this->content);
        }
        $footer = view(env('THEME').'.shop.footer')->render();
        $this->vars = array_add($this->vars,'footer',$footer);
        $sidebar = view(env('THEME').'.shop.sidebar')->render();
        $this->vars = array_add($this->vars,'sidebar',$sidebar);
        $content = view(env('THEME').'.shop.content')->render();
        $this->vars = array_add($this->vars,'content',$content);
        return view($this->template)->with($this->vars);

    }

    public function getMenu(){
        return \Menu::make('shopMenu',function ($menu){
            $menu->add('Home',['route' =>'index']);
            $menu->add('Shop',['route' =>'shop.index', 'url'=>'shop/']);
            $menu->add('Checkout',['route' =>'checkout.index', 'url'=>'checkout/']);
            $menu->add('Cart',['route' =>'cart.index', 'url'=>'cart/']);
            $menu->add('Login',['route' =>'shop.bikes.index', 'url'=>'shop/bikes']);

        });
    }
}
