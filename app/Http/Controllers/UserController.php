<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
  return response()->json(['User'=>$user, 'code'=>200]);
   }


     public function obtenerusuario($iduser){
        if(empty($iduser)){
            return response()->json(['mensaje'=>'Identificador vacio', 'code'=>406]);
        }
        $user=User::find($iduser);
        if($user){
            return response()->json(['id'=>$iduser, 'code'=>200]);
        }else{
            response()->json(['mensaje'=>'Usuario no encontrado', 'code'=>404]);
        }
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->nick)|| empty($request->email)|| empty($request->password)){
    return response()->json(['mensaje'=>"Datos incorrectos", 'code'=>406]);
    }
        $user=new User();
        $user->nick=$request->nick;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();

        return response()->json(['mensaje'=>'Usuario creado', 'code'=>'201']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nombre,$pass)
    {

if($nombre=="null" ||$pass=="null"){
    return response()->json(['mensaje'=>"Campos vacios", 'code'=>406,'value'=>'false']);
   }
    $user = User::where('nick',$nombre)->first();
    if(empty($user)){
        return response()->json(['mensaje'=> "Usuario no encontrado", 'code'=> 404,'value'=>'false']); 
    }
    if($user->password == $pass){
    return response()->json(['nick'=>$nombre,'mensaje'=> "Proceso exitoso Bienvenido!!",'code'=> 200, 'value'=>'true']);
    }
    /*
    
     return response()->json(['mensaje'=>"Ingrese datos validos",'code'=>406,'value'=>'true','color'=>'danger']);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
