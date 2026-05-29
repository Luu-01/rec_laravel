@extends('layouts.app')

@section('content')
<h1>Registro</h1>

<form method="POST" action="/register">
    @csrf
    <p>
        <label for="name">Nombre</label>
        <input id="name" name="name" value="{{ old('name') }}">
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </p>
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
    <p>
        <label for="password_confirmation">Confirmar contraseña</label>
        <input id="password_confirmation" type="password" name="password_confirmation">
    </p>
    <button type="submit">Registrarse</button>
</form>
@endsection
