<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;
use App\Http\Requests\ValidarActualizacionUsuario;
use App\Http\Requests\ValidarFormulario;

class UsuarioController extends Controller{
    
    public function __construct(){
        $this->middleware('auth')->except('show');
        $this->middleware('roles:moderador, admin', 
            ['except' => ['edit','update','show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){    
        // correcion de la consultas multiples error n+1
        $usuarios = User::with(['roles','note','etiqueta'])->get();
        return view('users.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $roles = Roles::pluck('rol_user', 'id');  
        return view('users.create', compact('roles'));
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ValidarFormulario  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarFormulario $request){
        $nuevo_user = User::create($request->all());
        $nuevo_user->roles()->attach($request->roles);
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $userContacto = User::findOrFail($id);
        return view('users.show',compact('userContacto'));     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        // buscar usuario en la base de datos y evitar
        // la insercion de datos nulos y aplicar provider
        // para la identidificacino de usuario
        $user = User::findorFail($id);
        $this->authorize('verificarPermiso',$user);
        $roles = Roles::pluck('rol_user', 'id');  
        return view('users.edit', compact('user', 'roles')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarActualizacionUsuario $request, $id){
        // buscar usuario en la base de datos y evitar
        // la insercion de datos nulos y aplicar provider
        // para la identidificacino de usuario
        $userActualizar = User::findorFail($id);
        $this->authorize('verificarPermiso',$userActualizar);
        $userActualizar->update($request->all());
        $userActualizar->roles()->sync($request->roles);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
         // buscar usuario en la base de datos y evitar
        // la insercion de datos nulos y aplicar provider
        // para la identidificacino de usuario
        $userEliminar = User::findorFail($id);
        $this->authorize('verificarPermiso',$userEliminar);
        $userEliminar->delete();
        return back();
    }

    
}
