<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";

    protected $fillable = ['plato_id','cliente_id','fecha'];

    public function plato(){
        return $this->belongsTo('App\Plato');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }
}
