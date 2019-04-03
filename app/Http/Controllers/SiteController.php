<?php

namespace App\Http\Controllers;

use app\Repositories\MenusRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
  protected $bag_rep;
  protected $bike_rep;
  protected $cus_rep;
  protected $leat_rep;
  protected $seat_rep;
  protected $acc_rep;
  protected $m_rep;
  protected $s_rep;
  protected $p_rep;
  protected $shop_rep;
  protected $template;
  protected $title;
  protected $vars =[];


  public function __construct(MenusRepository $m_rep)
  {
      $this->m_rep = $m_rep;

  }

  protected function renderOutput(){
      $menu = $this->getMenu();

      $navigation = view(env('THEME').'.navigation')->with('menu', $menu)->render();
      $this->vars = array_add($this->vars, 'navigation', $navigation);
      $this->vars = array_add($this->vars, 'title', $this->title);
      return view($this->template)->with($this->vars);
  }

  public function getMenu(){

      $menu = $this->m_rep->get();
     $mBuilder = \Menu::make('MyNav', function($m) use ($menu) {
         foreach ($menu as $item) {
             if($item->parent == 0){
                 $m->add($item->title, $item->path)->id($item->id);
//метод адд дбавляет  обьект мбилдер новый пункт меню
             }
             else{
                 if($m->find($item->parent)){
                     $m->find($item->parent)->add($item->title, $item->path)->id($item->id);
                 }
             }
         }
      });
      return $mBuilder;
  }

}
