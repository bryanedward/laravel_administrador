<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mensajes;

class Tags extends Model
{
    protected $fillable = ['nombre'];

    public function mensajes(){
        return $this->morphedByMany(Mensajes::class, 'tagable');
    }
}
