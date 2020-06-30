@extends('layouts.app')

@section('content')
<div class="form-group col-md-6">
    <form action="{{route('mensajes.update', $user->id)}}" 
        method="post" style="display:inline">
        @csrf @method('PUT') 
        @include('partials.form', [ 
            'btnValor' => 'Editar',
            'mostrarCampos' => !$user->id])
    </form>
</div>    
@endsection