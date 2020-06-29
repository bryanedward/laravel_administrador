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
                @if ($userContacto->mensajesJoin)
                    <td>{{$userContacto->mensajesJoin->name}}</td>
                @else
                    <td>{{$userContacto->nombre}}</td>
                @endif
            </tr>      
            <tr>
                <th scope="row">Role</th>
                <td>{{$userContacto->mensaje}}</td>
            </tr>      
        </tbody>
    </table>
</div>
@endsection