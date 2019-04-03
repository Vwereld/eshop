<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 11/02/2019
 * Time: 14:00
 */
namespace App\Repositories;
use Illuminate\Support\Facades\Config;

abstract class Repository {

    protected  $model = FALSE;

    public function get($select = '*',$pagination = FALSE){
        $builder = $this->model->select($select);

        if ($pagination){
            return $builder->paginate(Config::get('settings.paginate'));
        }
        return $builder->get();
    }

    public function one($id){
        $result = $this->model->where('id', $id)->first();
        return $result;
    }
}
