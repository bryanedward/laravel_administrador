<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model{
    
    protected $fillable = [
        'rol_user', 'descrip_user'
    ];
}
