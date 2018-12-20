<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class RegistroResidenteDetalle extends Model
{
    public $timestamps = false;
    protected $table = 'registro_residente_detalle';
    protected $primaryKey = "registro_residente_detalle_id";
    public $sequence = 'registro_residente_detalle_seq';

    public function registro_residente(){
        return $this->belongsTo('App\modelos\RegistroResidente','registro_residente_id','registro_residente_id');
    }

    public function dato_modulo(){
        return $this->belongsTo('App\modelos\DatosModulo','datos_modulo_id','datos_modulo_id');
    }

    public function alternativa(){
        return $this->belongsTo('App\modelos\DatosModuloAlternativa','alternativa_id','alternativa_id');
    }
    

}
