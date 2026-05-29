@extends('layouts.app')

@section('content')
<h1>Inicio de sesión</h1>

<form method="POST" action="/login">
    @csrf
    <p>
        <label for="email">Correo electrónico</label>
        <input id="email" name="email" value="{{ old('email') }}">
        @error('email') <span class="error">{{ $message }}</span> @enderror
    </p>
    <p>
        <label for="password">Contraseña</label>
        <input id="password" type="password" name="password">
        @error('password') <span class="error">{{ $message }}</span> @enderror
    </p>
    <button type="submit">Entrar</button>
</form>
@endsection
