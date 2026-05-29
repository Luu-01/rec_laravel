<header>
    <a href="{{ route('posts.index') }}"><strong>Blog Laravel</strong></a>

    <nav>
        <a href="{{ route('posts.index') }}">Posts</a>

        @auth
            <a href="{{ route('posts.create') }}">Crear post</a>
            <span>{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Registro</a>
        @endauth
    </nav>
</header>
