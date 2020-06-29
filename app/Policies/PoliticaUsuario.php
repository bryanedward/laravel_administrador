<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PoliticaUsuario
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability){
        // acceso permitido para el admin y moderador
        // para poder editar y elimininar revisaar funcion update 
        //usuariocontroller 
        if($user->Rol()){
            return true;
        }
    }

    public function verificarPermiso(User $authUser, User $user ){    
        // verificar usuario
        return $authUser->id === $user->id;
    }

    


}
