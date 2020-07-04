<?php 

namespace App\Presenters;
use Illuminate\Support\HtmlString;
use App\Mensajes;

class MensajesPresenter extends Presenter{

    // modelo view presents evitar la logica de programacion en las vistas
    // funciones para devolver datos a la pantalla de index de los mensajes

    // private $mensajes;


    // public function __construct(Mensajes $mensajes){
    //     $this->mensajes = $mensajes;
    // }


    public function name(){
        // funcion para presentar los nombres de los usuarios
        if($this->models->user_id){
            return $this->rutaUsuario();
        }    
        return $this->models->name;
    }


    public function email(){
        // funciones para presentar los datos del email
        if($this->models->user_id){
            return $this->models->mensajesJoin->email;
        }
        return $this->models->email;
    }


    public function rutaMensaje(){
        // funcion para enviar a la pantalla de cada mensaje 
        return new HtmlString("<a href= '". route('mensajes.show', $this->models->id) ."'>
                {$this->models->message}
                </a>");
    }


    public function rutaUsuario(){
        // funcion para enviar a los perfil de cada usuario registrados
        return new HtmlString("<a href= ' ". route('usuarios.show',
                $this->models->mensajesJoin->id) ." '>
                {$this->models->mensajesJoin->name}
        </a>");       
    }


    public function nota(){
        // hacaer referencia con la modelo mensajes
        return $this->models->note()->pluck('body')->implode(' ');
    }


    public function etiqueta(){
        // hacaer referencia con la modelo mensajes
        return $this->models->etiqueta()->pluck('nombre')->implode(' ');
    }


}

?>

