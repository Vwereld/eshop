<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 11/02/2019
 * Time: 13:58
 */
namespace App\Repositories;





use App\Shop;

class ShopRepository extends Repository {
    public function __construct(Shop $shop)
    {
        $this->model = $shop;
    }
}
