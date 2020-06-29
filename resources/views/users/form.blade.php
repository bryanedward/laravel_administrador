<label for="name">Nombre</label>
<input id="name" type="text" class="form-control" 
        name="name" value="{{$user->name ?? old('name')}}">
        {{$errors->first('name')}} <br>

<label for="email">Email</label>        
<input id="email" type="email" class="form-control" 
        name="email" value="{{$user->email ?? old('email')}}">
        {{ $errors->first('email')}} <br>

@unless ($user->id)
    {{-- visalizar si esta en el pantalla para crear un nuevo usuario--}}
    <label for="password">Password</label>
    <input id="password" 
            type="password" class="form-control" 
            name="password" placeholder="password">
            {{$errors->first('password')}} <br>

    <label for="confirmar_password">Confirmar password</label>
    <input id="password_confirmation" 
            type="password" class="form-control" 
            name="password_confirmation" placeholder="password">
            {{$errors->first('password')}} <br>

@endunless

<br>
<div class="checkbox">
    @foreach ($roles as $id => $item)
        <label for="roles">
        <input 
            type="checkbox"
            value="{{$id}}" 
            {{-- usar el metodo roles en la clase user --}}
            {{$user->roles->pluck('id')->contains($id) ? 'checked' : ''}}
            {{-- crear un array para la enviar mas de un rol--}}
            name="roles[]">
            {{$item}}                        
        </label>
    @endforeach
</div>
{{ $errors->first('roles')}}
<hr>
