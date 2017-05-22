<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";

    protected $fillable = ['ruc','razon_social','representante','usuario','clave'];

    public function comensals(){
        return $this->hasMany('App\Comensal');
    }
    public function menus(){
        return $this->hasMany('App\Menu');
    }
}
