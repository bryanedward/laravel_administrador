<?php 

namespace App\Presenters;
use Illuminate\Database\Eloquent\Model;

abstract class Presenter {
    
    protected $models;

    public function __construct(Model $models){
        $this->models = $models;
    }

    // clase abstracta para evitar los contructores de el mensajeprovide y userprovider
    // porque usan el mismo modelo del eloquent

}


?>