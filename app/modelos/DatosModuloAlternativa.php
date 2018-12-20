<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class DatosModuloAlternativa extends Model
{
    public $timestamps = false;
    protected $table = 'datos_modulo_alternativa';
    protected $primaryKey = "alternativa_id";
    public $sequence = 'datos_modulo_alternativa_seq';

    public function datos_modulo(){
        return $this->belongsTo('App\modulos\DatosModulo','datos_modulo_id','datos_modulo_id');
    }

}
