<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class DatosModulo extends Model
{
    public $timestamps = false;
    protected $table = 'datos_modulo';
    protected $primaryKey = "datos_modulo_id";
    public $sequence = 'datos_modulo_seq';

    public function modulo(){
        return $this->belongsTo('App\modelos\Modulo','modulo_id','modulo_id');
    }

    public function datos_modulo_alternativa(){
        return $this->hasMany('App\modelos\DatosModuloAlternativa','datos_modulo_id','datos_modulo_id');
    }

}
