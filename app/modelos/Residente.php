<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Residente extends Model
{
    public $timestamps = false;
    protected $table = 'residente';
    protected $primaryKey = "residente_id";
    public $sequence = 'residente_seq';

    public function centro_atencion(){
        return $this->belongsTo('App\modelos\CentroAtencion','centro_atencion_id','centro_atencion_id');
    }

    public function nombre_completo(){
        return $this->residente_apellido_paterno ." ".$this->residente_apellido_materno .", ".$this->residente_nombre;
    }

    public function registro_residente(){
        return $this->hasMany('App\modelos\RegistroResidente','residente_id','residente_id');
    }

    
}
