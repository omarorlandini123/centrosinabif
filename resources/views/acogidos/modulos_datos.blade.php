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
                    {!! Form::open(['url'=>route('Acogido.modulos.datos.update',['Acogido'=>$residente->residente_id,'Modulo'=>$modulo->modulo_id]),
                    'method'=>'POST']) !!}
                    @csrf
                    <br>
                    <center>
                    <h3>{{$residente->nombre_completo()}}</h3>
                    </center>
                    <br>
                    <div class="row">
                        
                        <div class="col-sm-8">
                            <p style="margin-bottom: 0px;"><strong>Centro: </strong>{{$residente->centro_atencion->cento_atencion_nombre}}</p>
                            <p><strong>Tipo: </strong>{{$residente->centro_atencion->tipo_centro->tipo_centro_nombre}}</p>
                        </div>
                        <div class="col-sm-4" style="float:right;">
                            <p><strong>Fecha Registro: </strong>{{$residente->residente_fecha_registro==null?"Sin Fecha":\Carbon\Carbon::parse($residente->residente_fecha_registro)->format('d/m/Y')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <hr>
                        </div>
                    </div>

                    @if ($modulo->datos_modulo==null || count($modulo->datos_modulo)==0) 
                    <center> <h3> No se han encontrado datos en este módulo </h3></center>
                    @else
                        @php
                            $datos= $modulo->datos_modulo;
                        @endphp
                        <br>
                        <h5><strong>{{$modulo->modulo_nombre}} </strong></h5>
                        
                        <div class="row">
                            @foreach ($datos as $dato)
                            <div class="col-sm-12">
                                    <br>
                                    <label for="formGroupExampleInput">{{($loop->index)+1}}.- {{$dato->datos_modulo_nombre}}</label>
                                    @if ($dato->datos_modulo_tipo==1)
                                        @if (count($dato->datos_modulo_alternativa)>0)
                                        <div class="form-group">
                                            <select class="form-control"name="cb:{{$dato->datos_modulo_id}}" id="cb:{{$dato->datos_modulo_id}}">
                                                @foreach ($dato->datos_modulo_alternativa as $alternativa)
                                                    <option value="{{$alternativa->alternativa_id}}">{{$alternativa->alternativa_nombre}}</option>
                                                @endforeach
                                            </select>   
                                        </div>                                         
                                        @endif
                                    @else
                                        @if ($dato->datos_modulo_tipo==2)
                                            @if (count($dato->datos_modulo_alternativa)>0)
                                           
                                                @foreach ($dato->datos_modulo_alternativa as $alternativa)
                                                <div class="form-group form-check" style="margin-bottom: 0px;">
                                                    <input class="form-check-input"type="checkbox" name="chk:{{$dato->datos_modulo_id}}_alt:{{$alternativa->alternativa_id}}" value="{{$alternativa->alternativa_id}}"/>
                                                    <label class="form-check-label" for="exampleCheck1">{{$alternativa->alternativa_nombre}}</label>
                                                </div> 
                                                @endforeach
                                                                            
                                            @endif
                                        @else
                                            <input type="text"   class="form-control" id="txt:{{$dato->datos_modulo_id}}" name="txt:{{$dato->datos_modulo_id}}"  value =""placeholder="Ingresa Tu Respuesta">
                                        @endif                                        
                                    @endif                                    
                                
                            </div>      
                            @endforeach
                        </div>   
                        <br>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                    <input type="submit" value="Guardar" class="btn btn-success">
                            </div>
                        </div>
                        
                                                 
                    @endif
                    {!!Form::close()!!}

            </div>
        </div>
    </div>
</div>
</div>
@endsection