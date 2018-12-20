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
                        <div class="col-sm-8">
                            
                        </div>
                    </div>

                    @if ($residente->centro_atencion->tipo_centro->modulo==null) 
                        <h3> No se han encontrado módulos disponibles </h3>
                    @else
                        @php
                            $modulos= $residente->centro_atencion->tipo_centro->modulo;
                        @endphp
                        @foreach ($etapas as $etapa)
                            <h4>{{$etapa->nombre}}</h4>    
                            <div class="row">
                                @foreach ($modulos as $modulo)
                                    @if ($modulo->id_etapa==$etapa->id_etapa)
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body" style="background-color: #fffbb3;">
                                                    <a href="{{route('Acogido.modulos.datos',['Acogido'=>$residente->residente_id,'Modulo'=>$modulo->modulo_id])}}" style="color: black">{{$modulo->modulo_nombre}}</a>
                                                </div>
                                            </div>
                                            <br>  
                                        </div>                                          
                                    @endif                                    
                                @endforeach        
                            </div>
                            
                            
                        @endforeach
                    @endif
                    

            </div>
        </div>
    </div>
</div>
</div>
@endsection