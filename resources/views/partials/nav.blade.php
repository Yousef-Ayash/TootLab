<nav class="nav-bar">
    <button onclick="history.back()" class="btn btn--light">← Back</button>
    <div class="nav-title">
        <img src="{{ asset('images/logo-placeholder.png') }}" alt="Logo" class="logo">
    </div>
    @auth
        <form method="POST" action="{{ route('logout') }}" class="inline-form">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn--danger">Logout</button>
        </form>
    @endauth
</nav>
