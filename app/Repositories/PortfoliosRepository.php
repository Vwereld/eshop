<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 11/02/2019
 * Time: 13:58
 */
namespace App\Repositories;




use App\Portfolio;

class PortfoliosRepository extends Repository {
    public function __construct(Portfolio $portfolio)
    {
        $this->model = $portfolio;
    }
}
