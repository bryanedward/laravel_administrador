@unless (isset($user) and $user->user_id)
    <div class="form-group">
      <label for="name">Nombre</label>
        <input type="text" class="form-control" 
        id="nombre" name="nombre" placeholder="name" value="{{ $user->nombre ?? old('nombre')}}">
      <label for="email">Email address</label>
      <input type="email" class="form-control" 
        id="email" name="correo" value="{{ $user->correo ?? old('correo')}}">
    </div>    
@endunless
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Example textarea</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" 
        rows="3" name="mensaje">{{ $user->mensaje ?? old('mensaje')}}</textarea>
    </div>
    <input class="btn btn-danger btn-xs"
            type="submit" value="{{ $btnValor  ?? 'Enviar' }}">