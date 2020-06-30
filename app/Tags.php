<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mensajes;
use App\User;

class Tags extends Model
{
    protected $fillable = ['nombre'];

    public function mensajes(){
        return $this->morphedByMany(Mensajes::class, 'tagable');
    }

    public function user(){
        return $this->morphedByMany(User::class, 'tagable');
    }

}
