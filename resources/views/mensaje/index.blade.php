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
                {{-- verificar validacion con el meotodo mensajesJoin en la clase modelo Mensajes --}}
                @if ($item->mensajesJoin)
                  <td>
                    {{$item->mensajesJoin->name}}
                  </td>  
                  <td>
                    {{$item->mensajesJoin->email}}
                  </td>
                @else
                  <td>
                    {{$item->nombre}}
                  </td>
                  <td>
                    {{$item->correo}}  
                  </td>    
                @endif
                <td>
                  <a href="{{route('mensajes.show', $item->id)}}">
                    {{$item->mensaje}}
                  </a>
                </td>
                <td>
                  {{$item->note->pluck('body')->implode('-')}}
                </td>
                <td>
                  {{$item->etiqueta->pluck('nombre')->implode('-')}}
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
</div>
@endsection
