<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensajes;
use App\Events\MessageWasReceived;
use App\Http\Requests\validarFormulario;
use App\Repositorios\InterfaceClass;

class MensajeController extends Controller
{
    private $repositorio;

    public function __construct(InterfaceClass $repositorio){
        // asignar el modelo repositorio al controlador mensaje para ser uso en toda la casa
        $this->repositorio = $repositorio;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index(){

        $mensajes = $this->repositorio->obtenerPaginacion();
        return view('mensaje.index', compact('mensajes'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('mensaje.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $message = $this->repositorio->guardarMensajes($request);

        event(new MessageWasReceived($message));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
        $userContacto = $this->repositorio->mostrarMensajes($id);

        return view('mensaje.show', compact('userContacto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $user = $this->repositorio->editarMensaje($id);
        return view('mensaje.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // actualizacion de datos
        $this->repositorio->actualizarMensaje($request, $id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $this->repositorio->eliminarMensajes($id);
        return redirect()->route('mensajes.index');
    }
}
