<?php 

namespace App\Repositorios;


interface InterfaceClass{

    function obtenerPaginacion();

    function guardarMensajes($request);

    function mostrarMensajes($id);
    
    function editarMensaje($id);

    function actualizarMensaje($request, $id);

    function eliminarMensajes($id);
    
}




?>