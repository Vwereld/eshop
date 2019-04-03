<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 11/02/2019
 * Time: 13:58
 */
namespace App\Repositories;


use App\Category;

class CategoriesRepository extends Repository {
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
}
