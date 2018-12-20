<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class CentroAtencion extends Model
{
    public $timestamps = false;
    protected $table = 'centro_atencion';
    protected $primaryKey = "centro_atencion_id";
    public $sequence = 'centro_atencion_seq';


    public function residente(){
        return $this->hasMany('App\modelos\Residente','centro_atencion_id','centro_atencion_id');
    }

    public function usuario_centro_atencion(){
        return $this->hasMany('App\modelos\UsuarioCentroAtencion','centro_atencion_id','centro_atencion_id');
    }

    public function tipo_centro(){
        return $this->belongsTo('App\modelos\TipoCentro','t_tipo_centro_id','tipo_centro_id');
    }
    
}
