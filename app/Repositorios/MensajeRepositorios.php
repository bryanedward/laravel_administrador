<?php  
    // Repostirio funciona como  intermediario entre la base de datos y la aplicacion

namespace App\Repositorios;
use App\Mensajes;
    


    class MensajeRepositorios implements InterfaceClass{
        
        // modelo repositorio nota solo un repositorio interactua con la base de datos

        public function obtenerPaginacion(){
            // funcion consulta en la base de datos o en la cache y presenta datos
            return Mensajes::with(['mensajesJoin','note','etiqueta'])
                ->orderBy('created_at', request('sorted', 'DESC'))
                ->paginate(10);
            
        }


        public function guardarMensajes($request){

            $message = Mensajes::create($request->all());
            if(auth()->check()){
                auth()->user()->mensajes()->save($message);
            }
        
            return $message;
        }


        public function mostrarMensajes($id){

            return Mensajes::findorFail($id); 
        }


        public function editarMensaje($id){

            return Mensajes::findorFail($id);
        }


        public function actualizarMensaje($request, $id){

            Mensajes::findorFail($id)->update($request->all());
        
        }


        public function eliminarMensajes($id){
            Mensajes::findOrFail($id)->delete();
        }


    }



?>