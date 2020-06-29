@extends('layouts.app')

@section('content')
<div class="form-group col-md-6">
    <form action="{{route('usuarios.update', $user->id)}}" 
        method="post" style="display:inline">
        @csrf @method('PUT') 
        @include('users.form')
            <button class="btn btn-danger btn-xs"
                type="submit">Actualizar</button>
    </form>
</div>    
@endsection