<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOrganizadorRequest;
use Carbon\Carbon;
use Auth;
use App\Evento;
use App\EventoTipoEntrada;
use DB;

class OrganizadorController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {        
    	$eventos=Evento::all();
        foreach ($eventos as $i => $evento) {
            $datos = $evento->fecha;
            list($año, $dia, $mes) = explode("-", $datos); 
            $evento->fecha="$dia/$mes/$año";
        }
        return \View::make('organizador.index',compact('eventos'));   
    }

    public function create()
    {
        return \View::make('organizador.create');
    }

    public function store(CreateOrganizadorRequest $request)
    {   
        if($request->cupos==1 && $request->cantidad==null){
            return redirect()->action('OrganizadorController@create')
                ->with('message', 'El campo cantidad es requerido si el cupo es limitado')
                ->withInput();
        }
        if(count($request->entrada)==0){
            return redirect()->action('OrganizadorController@create')
            ->with('message', 'Por favor seleccione mínimo un tipo de entrada')
            ->withInput();
        }
        else{
            for ($i=0; $i < count($request->entrada); $i++) { 
                if(($request->entrada[$i]==1 && ($request->precio_entrada[0]==null||$request->descripcion_entrada[0]==null))
                    ||($request->entrada[$i]==2 && ($request->precio_entrada[1]==null||$request->descripcion_entrada[1]==null))
                    ||($request->entrada[$i]==3 && ($request->precio_entrada[2]==null||$request->descripcion_entrada[2]==null))){
                    return redirect()->action('OrganizadorController@create')
                    ->with('message', 'Por favor debe rellenar los campos correspondientes al tipo de entrada seleccionada ')
                    ->withInput();
                }
            }
        }

        $input  = $request->fecha;
        $format = 'd/m/Y';
        $date = Carbon::createFromFormat($format, $input);
        $evento= new Evento;
        $evento->nombre_evento = $request->nombre_evento;
        $evento->usuario_id = Auth::user()->id;
        $evento->fecha = $date;
        $evento->hora = $request->hora_inicio;
        $evento->cupo_id = $request->cupos;
        if($request->cupos==1){
        	$evento->cantidad = $request->cantidad;
        }
        $evento->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $evento->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $evento->save();
		$eventos=DB::table('eventos')->orderBy('id', 'desc')->first();
        for ($i=0; $i < count($request->entrada) ; $i++) { 	
        	$tipo_entradas=new EventoTipoEntrada;
        	$tipo_entradas->evento_id=$eventos->id;
        	$tipo_entradas->tipo_entradas_id=$request->entrada[$i];       	
        	$tipo_entradas->descripcion_entrada=$request->descripcion_entrada[$i];       	
        	$tipo_entradas->precio_entrada=$request->precio_entrada[$i];       	
        	$tipo_entradas->created_at = Carbon::now()->format('Y-m-d H:i:s');
        	$tipo_entradas->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        	$tipo_entradas->save();
        }

        return redirect('organizador/index')
        ->with("message","Evento agregado correctamente");
    }

}
