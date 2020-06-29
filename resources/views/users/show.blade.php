@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">nombre</th>
          </tr>
        </thead>
         
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$userContacto->id}}</td>
            </tr>
            <tr>
                <th scope="row">Nombre</th>
                <td>{{$userContacto->name}}</td>
            </tr>      
            <tr>
                <th scope="row">Role</th>
                <td>
                    @foreach ($userContacto->roles as $item)
                        {{$item->descrip_user}}
                    @endforeach
                </td>
            </tr>      

        </tbody>
    </table>

    @can('verificarPermiso', $userContacto)
        <a class="btn btn-info" 
            href="{{route('usuarios.edit',$userContacto->id)}}">
            Cambiar 
        </a>
    @endcan
    @can('verificarPermiso', $userContacto)
        <form action="{{route('usuarios.destroy', $userContacto->id)}}" 
            method="post" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-xs"
                type="submit">Borrar</button>
        </form>
    @endcan
    
</div>
@endsection