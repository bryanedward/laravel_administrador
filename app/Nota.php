<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = ['body'];
    
    public function notable(){
        return $this->morphTo();
    }
}
