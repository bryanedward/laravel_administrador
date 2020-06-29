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
        </tr>
      </thead>
      <tbody>
          @foreach ($usuarios as $item)
          <tr>
              <th scope="row">
                {{$item->id}}
              </th>
              <td>
                {{$item->name}}
              </td>
              <td>
                {{ $item->roles->pluck('descrip_user')->implode(' - ') }}
              </td>
              <td>
                {{$item->note->pluck('body')->implode(' - ')}}
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
