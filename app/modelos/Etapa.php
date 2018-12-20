<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    public $timestamps = false;
    protected $table = 'etapa';
    protected $primaryKey = "id_etapa";
    
}
