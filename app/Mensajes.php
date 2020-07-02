<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Nota;
use App\Tags;

class Mensajes extends Model{

    protected $fillable = ['name', 'email', 'message'];
    
    public function mensajesJoin(){
        // relacionar tablas
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
}
