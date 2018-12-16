@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('principal.navbar_registro')
        </div>
        <div class="col-md-9">
            <div class="card">

                <div class="card-body">
                    <br>
                    <center>
                        <h3>Usuarios Acogidos</h3>
                    </center>
                    <br>
                    {!! Form::open(['action'=>'AcogidosController@index',
                    'method'=>'GET','class'=>'input-group' ]) !!}


                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nombre del usuario o DNI" aria-label="Nombre del usuario o DNI"
                            aria-describedby="button-addon2" name="cond" id="cond" value="{{empty($q)?"":$q}}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Buscar</button>
                        </div>
                    </div>

                    {!!Form::close()!!}


                    <div class="list-group">
                        @for ($i = 0; $i < 5; $i++) 
                        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start "
                            style="padding-top: 10px; padding-bottom: 0px;">
                            <div class=" justify-content-between" style="display: flex;" >
                                  <h5 style="margin-bottom:0px;"> <a href=""> Mario Fernandez Acosta</a></h5>
                                <div style="float:right;">
                                    <a href="">Ver Datos</a> |
                                    <a href="">Eliminar</a>
                                </div>
                            </div>
                            <div class="d-flex w-100 justify-content-between">
                                <p class="mb-1">Centro: Hogar San Antonio</p>
                                <small>DNI: 89563487</small>
                            </div>

                        </div>
                        @endfor


                    </div>


            </div>
        </div>
    </div>
</div>
</div>
@endsection