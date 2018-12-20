<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class RegistroResidente extends Model
{
    public $timestamps = false;
    protected $table = 'registro_residente';
    protected $primaryKey = "registro_residente_id";
    public $sequence = 'registro_residente_seq';

    public function residente(){
        return $this->belongsTo('App\modelos\Residente','residente_id','residente_id');
    }

    public function usuario_reg(){
        return $this->belongsTo('App\User','usuario_reg_id','usuario_id');
    }

    public function detalle_registro(){
        return $this->hasMany('App\modelos\RegistroResidenteDetalle','registro_residente_id','registro_residente_id');
    }
}
