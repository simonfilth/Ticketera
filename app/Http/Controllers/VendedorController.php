<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Venta;
use App\Evento;
use App\Validar;
use App\EventoTipoEntrada;

class VendedorController extends Controller
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
    	foreach ($ventas as $i => $venta) {
    		$datos = $venta->fecha;
	        list($año, $dia, $mes) = explode("-", $datos); 
	        $venta->fecha="$dia/$mes/$año";
    	}
        $validar=Validar::all();
        // dd($validar);
        return \View::make('vendedor.index',compact('ventas','validar'));   
    }

    public function create()
    {
    	
    	$event=Evento::join('evento_tipo_entradas','eventos.id','evento_tipo_entradas.evento_id')->get();

    	Carbon::setLocale('es');

    	$fecha = Carbon::now();
    	$fecha=$fecha->subHours(4);
		$date = $fecha->format('Y-d-m');
		$time = $fecha->format('h:i:s');
		$i=0;
		$eventos=null;
    	foreach ($event as $evento) {

    		$input  = $evento->fecha.' '.$evento->hora;
        	$format = 'Y-d-m h:i:s';
    		if($evento->fecha>=$date && ($evento->cantidad==null||$evento->cantidad>0)){
    			if($evento->fecha==$date && $evento->hora<$time){
    				$eventos[$i++]=$evento;
    			}  	
    			elseif($evento->fecha>$date) {
    				$eventos[$i++]=$evento;
    			}		
    			
    		}
    	}
    	$an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
    	$su= strlen($an) - 1;
    	$codigo=substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1);
        return \View::make('vendedor.create',compact('eventos','codigo','evento_tipo_entradas'));
    }

    public function store(Request $request)
    {   
        $datos = EventoTipoEntrada::find($request->evento_id);

        $venta= new Venta;
        $venta->codigo = $request->codigo;
        $venta->usuario_id = Auth::user()->id;
        $venta->evento_id = $datos->id;
        $venta->email = $request->email;
        $venta->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $venta->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $venta->save();
        	
    	$evento=Evento::find($datos->evento_id);
    	if($evento->cupo_id==1){
        	$evento->cantidad -= 1;	
        }  	
    	$evento->updated_at = Carbon::now()->format('Y-m-d H:i:s');
    	$evento->save();
        $evento_entrada=EventoTipoEntrada::find($datos->id);
    	$evento=Evento::find($evento_entrada->evento_id);
    	$codigo=$request->codigo;
		$to = $request->email; 
		$fecha=$evento->fecha;

		$nombre_evento=$evento->nombre_evento;
		$hora=$evento->hora;
		$email_subject = "Contacto del vendedor";
		$email_body = "Has recibido un Email de notificación de venta.\n\nAquí tenemos los detalles:\n\nNombre del evento: $nombre_evento\n\nFecha: $fecha\n\nHora: $hora\n\nCodigo: $codigo\n";
		$headers = "From: noreply@ticketera.com\n"; 
		$headers .= "Reply-To: Email";	
	
		mail($to,$email_subject,$email_body,$headers);
		 
		 // \Mail::send('vendedor.correo', ['email' => $to], function ($m) use ($to) {
   //          $m->from('hello@app.com', 'Your Application');

   //          $m->to($to, "asistente")->subject('Your Reminder!');
   //      });

        return redirect('vendedor/index')
        ->with("message","Venta realizada correctamente, Se ha enviado un email al asistente");
    }
}
