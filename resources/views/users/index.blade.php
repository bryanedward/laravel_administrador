@extends('layouts.app')

@section('content')
<div class="container">
  <div class="float-right">
    <a class="btn btn-primary" href="{{route('usuarios.create')}}">Crear usuario</a>
  </div><br>
  <table class="table">
      <thead>
        <tr>
          <th scope="col">nombre</th>
          <th scope="col">correo</th>
          <th scope="col">role</th>
          <th scope="col">notitas</th>
          <th scope="col">etiquetas</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($usuarios as $item)
          <tr>
              <th scope="row">
                {{$item->userPresenter()->id()}}
              </th>
              <td>
                {{$item->userPresenter()->name()}}
              </td>
              <td>
                {{ $item->userPresenter()->roles()}}
              </td>
              <td>
                {{$item->userPresenter()->nota()}}
              </td>
              <td>
                {{ $item->userPresenter()->etiqueta()}}
              </td>
              <td>
                <a class="btn btn-info btn-xs" 
                  href="{{route('usuarios.edit', $item->id)}}">Editar</a>
                <form action="{{route('usuarios.destroy', $item->id)}}" 
                  method="post" style="display:inline">
                  @csrf @method('DELETE')
                  <button class="btn btn-danger btn-xs"
                  type="submit">Borrar</button>
                </form>
              </td>
            </tr>      
          @endforeach
      </tbody>
  </table>
</div>
@endsection
