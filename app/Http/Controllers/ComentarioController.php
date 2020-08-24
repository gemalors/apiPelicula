<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
class ComentarioController extends Controller
{
    public function show($idMovie){
    	$coment=Comentario::where('idmovie', $idMovie)->get();
    	return response()->json(['comentario'=>$coment]);
}

public function store(Request $request){
if(empty($request->nombre)||empty($request->descripcion)||empty($request->idmovie)){
	return response()->json(['mensaje'=>"Error al enviar comentario", 'code'=>401]);
	}

	$coment=new Comentario();
	$coment->nombre=$request->nombre;
	$coment->descripcion=$request->descripcion;
	$coment->idmovie=$request->idmovie;
	
	$coment->save();
return response()->json(['mensaje'=>'Comentario agregado', 'code'=>201]);

}
 
   public function mostrarComent(){
   		$coment=Comentario::all();
    	return response()->json(['comentario'=>$coment]);
   
}

}
