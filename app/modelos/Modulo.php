<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    public $timestamps = false;
    protected $table = 'modulo';
    protected $primaryKey = "modulo_id";
    public $sequence = 'modulo_seq';

    public function tipo_centro(){
        return $this->belongsTo('App\modelos\TipoCentro','tipo_centro_id','tipo_centro_id');
    }
    public function etapa(){
        return $this->belongsTo('App\modelos\Etapa','id_etapa','id_etapa');
    }

    public function datos_modulo(){
        return $this->hasMany('App\modelos\DatosModulo','modulo_id','modulo_id');
    }


}
