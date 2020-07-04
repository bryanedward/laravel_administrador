<?php 

namespace App\Presenters;
use App\User;

class UserPresenter extends Presenter{

    // protected $user;


    // public function __construct(User $user){
    //     // obtener el modelo del modelo User y implementar en esta clase
    //     $this->user = $user;
    // }


    public function id(){
        
        return $this->models->id;
    }

    public function name(){
     
        return $this->models->name;
    }


    public function roles(){

        return $this->models->roles()->pluck('descrip_user')->implode(' - ');
    }


    public function nota(){
        return $this->models->note->pluck('body')->implode(' - ');
    }


    public function etiqueta(){
        return $this->models->etiqueta->pluck('nombre')->implode(', ');

    }


}

?>