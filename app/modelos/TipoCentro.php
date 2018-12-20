<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class TipoCentro extends Model
{
    public $timestamps = false;
    protected $table = 'tipo_centro';
    protected $primaryKey = "tipo_centro_id";
    public $sequence = 'tipo_centro_seq';

    public function modulo(){
        return $this->hasMany('App\modelos\Modulo','tipo_centro_id','tipo_centro_id'); 
    }

}
