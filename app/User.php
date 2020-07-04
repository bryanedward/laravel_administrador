<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Presenters\UserPresenter;
use App\Mensajes;
 

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

     protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function roles(){
        // relacionar los usuarios con los roles
        return $this->belongsToMany(Roles::class, 'asignar_roles');
    }

    public function verificarRol(array $rolUsuario){
        //validacion de roles para la visualizacion 
        //del item en el navegador

        //con el meotod puck buscamos todos los array
        // en la columna rol_user y intersect para comparar
        // si existe devuelte un array y count para verificar
        // si el resultado es 0 si es cero es false y 1 es true
        return $this->roles->pluck('rol_user')
            ->intersect($rolUsuario)->count();
    }

    public function Rol(){
        //funcion flexible para identifar roles 
        return $this->verificarRol(['moderador']);
    }

    public function note(){
        // hace relacion los mensajes con las notas
        return $this->morphMany(Nota::class, 'notable');
    }

    public function etiqueta(){
        // hacer referencia con la clase Tags etiqueta
        return $this->morphToMany(Tags::class, 'tagable');
    }

    public function mensajes(){
        // relacionar con la clase mensaje
        return $this->hasMany(Mensajes::class);
    }


    public function userPresenter(){
        // enviar los datos al view provider
        return  new UserPresenter($this);
    }

}
