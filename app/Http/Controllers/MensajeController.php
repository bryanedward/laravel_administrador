<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensajes;
use App\Events\MessageWasReceived;
use App\Http\Requests\validarFormulario;
use Illuminate\Support\Facades\Cache;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index(){

        $itemCache = "mensajes.pagina." . request('page', 1); 

        $mensajes = Cache::remember($itemCache, 60, function() {
            // 1. parametro el id 2. tiempo 3. funcion anonima 
            return Mensajes::with(['mensajesJoin','note','etiqueta'])
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->paginate(10);
        });
        
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
        
        $message = Mensajes::create($request->all());
        // no envia mensajes cuando estas logueado
        if(auth()->check()){
            auth()->user()->mensajes()->save($message);
        }

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
        $userContacto = Mensajes::findorFail($id);
        return view('mensaje.show', compact('userContacto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user = Mensajes::findorFail($id);
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
        $user = Mensajes::findorFail($id);
        $user->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Mensajes::findOrFail($id)->delete();

        Cache::flush();
        return redirect()->route('mensajes.index');
    }
}
