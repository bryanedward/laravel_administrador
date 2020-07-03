@extends('layouts.app')

@section('content')
<div class="container py-3">

        <h1>Welcome {{$dataUser->name}}</h1>
        <p>Email {{$dataUser->email}}</p>
</div>
@endsection
