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


                    <div class="row">
                        <div class="col-sm-9">
                            {!! Form::open(['action'=>'AcogidosController@index',
                            'method'=>'GET','class'=>'input-group' ]) !!}
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nombre del usuario o DNI"
                                    aria-label="Nombre del usuario o DNI" aria-describedby="button-addon2" name="q" id="q"
                                    value="{{empty($q)?"":$q}}">
                                <div class="input-group-append">
                                    <input class="btn btn-primary" type="submit" id="button-addon2" value="Buscar" />
                                </div>
                            </div>

                            {!!Form::close()!!}

                        </div>
                        <div class="col-sm-3 text-right">
                            <button class="btn btn-success" onclick="nuevoUsuario()">Nuevo</button>
                        </div>
                    </div>
                    <br>
                    @if(count($residentes)>0)
                    <div class="list-group">
                        @for ($i = 0; $i <count($residentes) ; $i++)
                        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start "
                            style="padding-top: 10px; padding-bottom: 0px;">
                                <div class=" justify-content-between" style="display: flex;">
                                    <h5 style="margin-bottom:0px;"> <a href="javascript:editarUsuario({{$residentes[$i]->residente_id}})"> {{$residentes[$i]->nombre_completo()}}</a></h5>
                                    <div style="float:right;">

                                        <form action="{{route('Acogido.destroy',['Acogido'=>$residentes[$i]])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{route('Acogido.modulos',['Acogido'=>$residentes[$i]])}}">Ver Datos</a>
                                            |
                                            <input class="btn btn-link" style="padding: 0px;" type="submit" value="Eliminar">
                                        </form>

                                    </div>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1">Centro: {{$residentes[$i]->centro_atencion->cento_atencion_nombre}}</p>
                                    <small>DNI: {{$residentes[$i]->residente_documento}}</small>
                                </div>

                        </div>
                        @endfor
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                                <center> {{$residentes->links('principal.paginator_admin')}}</center>
                        </div>
                    </div>
                    
                    @else
                        <center><h3>No se han encontrado residentes que ud. pueda ver</h3></center>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
