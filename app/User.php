<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $table='USUARIO';
    public $timestamps = false;
    protected $primaryKey = 'usuario_id';
    public $sequence = 'USUARIO_SEQ';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_user',  'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];    

    public function nombre_completo(){
        return $this->usuario_apellido_pa ." ".$this->usuario_apellido_ma .", ".$this->usuario_nombre;
    }
}
