<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\MensajesPresenter;
use App\User;
use App\Nota;
use App\Tags;

class Mensajes extends Model{

    protected $fillable = ['name', 'email', 'message', 'user_id'];
    
    public function mensajesJoin(){
        // relacionar tablas con la tabla User con el user_id
        return $this->belongsTo(User::class, 'user_id');
    }

    public function note(){
        // hace relacion los mensajes con las notas
        return $this->morphMany(Nota::class, 'notable');
    }

    public function etiqueta(){
        // hacer referencia con la clase Tags etiqueta
        return $this->morphToMany(Tags::class, 'tagable');
    }

    public function mensajePresenter(){
        // funcion para la implementacion del view present
        return new MensajesPresenter($this);
    }

    
   
}
