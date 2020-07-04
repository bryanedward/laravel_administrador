@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">NOMBRE</th>
                <td>{{$userContacto->mensajePresenter()->name()}}</td>
            </tr>
            <tr>
                <th scope="row">EMAIL</th>
                <td>{{$userContacto->mensajePresenter()->email()}}</td>
            </tr>      
        </tbody>
    </table>
</div>
@endsection