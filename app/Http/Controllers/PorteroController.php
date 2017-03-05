<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Validar;
use Auth;
use Carbon\Carbon;

class PorteroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {        
    	$ventas=Venta::join('evento_tipo_entradas as et','et.id','ventas.evento_id')
    		->join('eventos','eventos.id','et.evento_id')
    		->join('users','users.id','ventas.usuario_id')
    		->select('et.*', 'users.name','eventos.fecha','eventos.nombre_evento','eventos.hora', 'ventas.codigo', 'ventas.email')
    		->get();
    	$ventas_validar=null;
    	foreach ($ventas as $i => $venta) {
    		$validar=Validar::where('evento_id',$venta->id)->first();
    		if($validar==null){
    			$ventas_validar[$i]=$venta;
    			$datos = $venta->fecha;
		        list($año, $dia, $mes) = explode("-", $datos); 
		        $ventas_validar[$i]->fecha="$dia/$mes/$año";
    		}		
    	}
        return \View::make('portero.index',compact('ventas_validar'));   
    }
    public function store(Request $request)
    {
    	$venta=Venta::where('evento_id',$request->venta)->first();
    	$validar= new Validar;
    	$validar->usuario_id=Auth::user()->id; 
    	$validar->evento_id=$venta->evento_id; 
    	$validar->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $validar->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $validar->save();
    	return redirect()->action('PorteroController@index')
        ->with("message","Entrada Canjeada correctamente");   
    }
}
