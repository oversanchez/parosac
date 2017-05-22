<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = "plato";

    protected $fillable = ['nombre','url_foto'];

    public function menus(){
        return $this->hasMany('App\Menu');
    }
}
