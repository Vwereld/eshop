<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 11/02/2019
 * Time: 13:58
 */
namespace App\Repositories;


use App\Menu;

class MenusRepository extends Repository {
    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }
}
