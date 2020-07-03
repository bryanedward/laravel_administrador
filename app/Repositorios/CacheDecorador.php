<?php 

    namespace App\Repositorios;
    use Illuminate\Support\Facades\Cache;

    
    class CacheDecorador implements InterfaceClass{
        
        // DECORADOR DEBE INCLUIR TODOS LOS METOODOS  DEL OBJETO A DECORAR
        private $repositorio;

        public function __construct(MensajeRepositorios $repositorio){
            $this->repositorio = $repositorio;
        }


        public function obtenerPaginacion(){

            //funcion para obtienen la paginacion actual guarda en la cache con el id de la paginacion 
            $itemCache = "mensajes.pagina." . request('page', 1); 

            return  Cache::tags('mensajes')->rememberForEver($itemCache, function() {
                return  $this->repositorio->obtenerPaginacion();
            });

        }


        public function guardarMensajes($request){
            
            //funcion para guarda datos  y elimina el id del mensaje en cache y retorna 
            $mensajes = $this->repositorio->guardarMensajes($request);
            Cache::tags('mensajes')->flush();
            return $mensajes; 
        }


        public function mostrarMensajes($id){

            // funcion para consulta en la cache si no consulta en la base de datos y retorna
            return Cache::tags('mensajes')->rememberForEver("mensaje.user.{$id}", function() use ($id){
                return $this->repositorio->mostrarMensajes($id); 
            });

        }

        
        public function editarMensaje($id){

            // funcion para obtener datos en la cache  o en la base de datos para poder ediar
            return Cache::tags('mensajes')->rememberForEver("editMensaje.user.{$id}", function() use ($id){
                return $this->repositorio->editarMensaje($id);
            });

        }


        public function actualizarMensaje($request, $id){
            $this->repositorio->actualizarMensaje($request, $id);
            Cache::tags('mensajes')->flush();

        }


        public function eliminarMensajes($id){

            //funcion para eliminar datos en la base de datos y el cache
            $this->repositorio->eliminarMensajes($id);            
            Cache::tags('mensajes')->flush();

        }


    }



?>