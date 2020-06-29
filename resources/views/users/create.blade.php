@extends('layouts.app')

@section('content')

<div class="form-group col-md-6">
    {{-- formulario para la creacion de una cuenta de usuario --}}
    <form method="POST" action="{{route('usuarios.store')}}">
        @csrf
        @include('users.form', ['user' => new App\User])
        <button class="btn btn-success btn-xs"
        type="submit">Crear</button>
    </form>
</div>

@endsection