@if ($mostrarCampos)
    <div class="form-group">
      <label for="name">Nombre</label>
        <input type="text" class="form-control" 
        id="nombre" name="name" placeholder="name" value="{{ $user->name ?? old('name')}}">
      <label for="email">Email address</label>
      <input type="email" class="form-control" 
        id="email" name="email" value="{{ $user->email ?? old('email')}}">
    </div>    
@endif
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Example textarea</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" 
        rows="3" name="message">{{ $user->message ?? old('message')}}</textarea>
    </div>
    <input class="btn btn-danger btn-xs"
            type="submit" value="{{ $btnValor  ?? 'Enviar' }}">