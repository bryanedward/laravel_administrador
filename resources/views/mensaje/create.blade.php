@extends('layouts.app')

@section('content')

<div class="col-7">
    <form class="" method="POST" action="{{route('mensajes.store')}}">
        @csrf
        @include('partials.form')
    </form>
</div>
@endsection