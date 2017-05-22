<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comensal extends Model
{
    protected $table = "comensal";

    protected $fillable = ['nombres','activo','cliente_id'];

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

}
