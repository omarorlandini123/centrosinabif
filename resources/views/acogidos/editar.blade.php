<div class="modal-dialog" role="document">
    {!! Form::open(['url'=>route('Acogido.update', ['id' => $residente->residente_id]),
    'method'=>'POST']) !!}
    @csrf
   @method('PUT')
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Editar Usuario Acogido</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txt_nombre">Nombre</label>
                        <input type="text" class="form-control" id="txt_nombre"  name="txt_nombre" value="{{$residente->residente_nombre}}" placeholder="Ingrese el nombre">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txt_ape_pa">Apellido Paterno</label>
                        <input type="text" class="form-control" id="txt_ape_pa"  name="txt_ape_pa" value="{{$residente->residente_apellido_paterno}}" placeholder="Ingrese el apellido paterno">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txt_ape_ma">Apellido Materno</label>
                        <input type="text" class="form-control" id="txt_ape_ma"  name="txt_ape_ma" value="{{$residente->residente_apellido_materno}}" placeholder="Ingrese el apellido materno">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txt_dni">DNI</label>
                        <input type="number" class="form-control" id="txt_dni"  name="txt_dni" value="{{$residente->residente_documento}}" placeholder="Ingrese el DNI">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="centro_acogida">Centro de acogida</label>                       
                        <select class="form-control"name="centro_acogida" id="centro_acogida">
                            @foreach ($centros as $centro)
                                <option {{$residente->centro_atencion_id==$centro->centro_atencion_id?"selected":""}} value="{{$centro->centro_atencion_id}}">{{$centro->cento_atencion_nombre}}</option>
                            @endforeach
                        </select>                               
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txt_sexo">Sexo</label>                       
                        <select class="form-control"name="txt_sexo" id="txt_sexo">                            
                            <option {{$residente->residente_sexo==1?"selected":""}} value="1">Masculino</option>
                            <option {{$residente->residente_sexo==2?"selected":""}} value="2">Femenino</option>
                            
                        </select>                               
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="Guardar" class="btn btn-success">
        </div>
    </div>

    {!!Form::close()!!}
</div>