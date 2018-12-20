<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class UsuarioCentroAtencion extends Model
{
    public $timestamps = false;
    protected $table = 'usuario_centro_atencion';
    protected $primaryKey = "usuario_centro_atencion_id";
    public $sequence = 'usuario_centro_atencion_seq';

    public function usuario(){
        return $this->belongsTo('App\User','usuario_id','usuario_id');
    }

    public function centro_atencion(){
        return $this->belongsTo('App\modelos\CentroAtencion','centro_atencion_id','centro_atencion_id');
    }

    

}
