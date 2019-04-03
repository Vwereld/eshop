<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 11/02/2019
 * Time: 13:58
 */
namespace App\Repositories;


use App\Product;

class ProductsRepository extends Repository {
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function one($id){
       $product =  parent::one($id);
       return $product;
    }
}
