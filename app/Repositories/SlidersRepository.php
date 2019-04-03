<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 11/02/2019
 * Time: 13:58
 */
namespace App\Repositories;




use App\Slider;

class SlidersRepository extends Repository {
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }
}
