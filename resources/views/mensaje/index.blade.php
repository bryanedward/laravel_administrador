@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">nombre</th>
            <th scope="col">correo</th>
            <th scope="col">mensajes</th>
            <th scope="col">notas</th>
            <th scope="col">etiquetas</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($mensajes as $item)
            <tr>
                {{-- view presents --}}
                <td> 
                  {{ $item->mensajePresenter()->name() }}
                </td>
                <td> 
                  {{$item->mensajePresenter()->email()}} 
                </td>
                <td>
                  {{$item->mensajePresenter()->rutaMensaje()}}
                </td>
                <td>
                  {{$item->mensajePresenter()->nota()}}
                </td>
                <td>
                  {{$item->mensajePresenter()->etiqueta()}}
                </td>
                <td>
                  <a class="btn btn-info btn-xs" 
                    href="{{route('mensajes.edit', $item->id)}}">Editar</a>
                  <form action="{{route('mensajes.destroy', $item->id)}}" 
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
    {{$mensajes->fragment('hash')->appends(request()->query())->links('pagination::bootstrap-4')}}
</div>
@endsection
