<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;

use App\User;
use App\modelos\Residente;
use App\modelos\CentroAtencion;
use App\modelos\UsuarioCentroAtencion;
use App\modelos\TipoCentro;
use App\modelos\Etapa;
use App\modelos\Modulo;
use Carbon\Carbon;


class AcogidosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        $this->usuario_id=Auth::user()->usuario_id;
        $this->q=$request->input('q');
        
        $residentes = Residente::whereHas('centro_atencion',function($a){
            $a->whereHas('usuario_centro_atencion',function($b){
                $b->where('usuario_id',$this->usuario_id);
            });
        })
        ->whereRaw("upper(residente_nombre || ' ' || residente_apellido_paterno  || ' ' || residente_apellido_materno) like upper(?) ", ['%' . $this->q . '%'])
        
        ->paginate(5);

       
        $data=array(
            'residentes'=>$residentes->appends(Input::except('page')),
            'q'=>$this->q
        );
        return view('acogidos.listar')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros = CentroAtencion::all();
        $data=array(
            'centros'=>$centros
        );
        return view('acogidos.nuevo')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request->input('txt_nombre');
        $ape_pa= $request->input('txt_ape_pa');
        $ape_ma= $request->input('txt_ape_ma');
        $dni = $request->input('txt_dni');
        $sexo= $request->input('txt_sexo');
        $centro_atencion_id = $request->input('centro_acogida');

        $residente = new Residente;
        $residente->centro_atencion_id=$centro_atencion_id;
        $residente->residente_nombre= $nombre;
        $residente->residente_apellido_paterno=$ape_pa;
        $residente->residente_apellido_materno=$ape_ma;
        $residente->residente_documento=$dni;
        $residente->residente_sexo=$sexo;
        $residente->residente_fecha_registro=Carbon::now();
        $residente->save();

        if($residente->residente_id>0){
            return redirect('/Acogido');
        }

        return view('principal.error')->with(['error'=>'No se ha podido guardar el residente']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)    
    {
        $residente = Residente::where('residente_id',$id)->first();

        if($residente==null){
            return view('principal.error')->with(['error'=>'El residente seleccionado no existe']);
        }

        $centros = CentroAtencion::all();
        $data=array(
            'centros'=>$centros,
            'residente'=>$residente
        );
        return view('acogidos.editar')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nombre = $request->input('txt_nombre');
        $ape_pa= $request->input('txt_ape_pa');
        $ape_ma= $request->input('txt_ape_ma');
        $dni = $request->input('txt_dni');
        $sexo= $request->input('txt_sexo');
        $centro_atencion_id = $request->input('centro_acogida');

        $residente = Residente::where('residente_id',$id)->first();
        $residente->centro_atencion_id=$centro_atencion_id;
        $residente->residente_nombre= $nombre;
        $residente->residente_apellido_paterno=$ape_pa;
        $residente->residente_apellido_materno=$ape_ma;
        $residente->residente_documento=$dni;
        $residente->residente_sexo=$sexo;
        $residente->save();

        if($residente->residente_id>0){
            return redirect('/Acogido');
        }

        return view('principal.error')->with(['error'=>'No se ha podido guardar el residente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function modulos(Request $request, $id){

        $this->usuario_id=Auth::user()->usuario_id;
        $residente = Residente::where('residente_id',$id)->first();

        if($residente==null){
            return view('principal.error')->with(['error'=>'El residente seleccionado no existe']);
        }

        $etapas = Etapa::all();

        $data=array(
            'residente'=>$residente,
            'etapas'=>$etapas,
        );

        return view('acogidos.modulos')->with($data);


    }

    public function modulos_datos(Request $request, $id,$idModulo){

        $this->usuario_id=Auth::user()->usuario_id;
        $residente = Residente::where('residente_id',$id)->first();
        $modulo = Modulo::where('modulo_id',$idModulo)->first();

        if($residente==null){
            return view('principal.error')->with(['error'=>'El residente seleccionado no existe']);
        }

        if($modulo==null){
            return view('principal.error')->with(['error'=>'El módulo seleccionado no existe']);
        }

        $etapas = Etapa::all();

        $data=array(
            'residente'=>$residente,
            'modulo'=>$modulo,
        );

        
        return view('acogidos.modulos_datos')->with($data);

    }

    public function update_datos(Request $request,$id,$idModulo){
        return dd($request);
    }
}
