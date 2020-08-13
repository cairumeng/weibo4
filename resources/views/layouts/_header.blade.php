<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('index') }}">
        <img src="/images/weibo.jpg" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
        <h1 class="d-inline">Weibo</h1>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mt-3">
                <a class="nav-link " href="{{ route('help') }}">Help</a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link" href="{{ route('about')}}">About</a>
            </li>
            @if(Auth::check())
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" class="header-avatar">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Info edit</a>
                    <a class="dropdown-item" href="{{ route('users.edit',Auth::user()) }}">User center</a>
                    <form method="POST" action="{{ route('sessions.destroy') }}">
                        @csrf
                        {{method_field('DELETE')}}
                        <button class="dropdown-item" href="">Logout</button>
                    </form>
                </div>
            </li>
            @else
            <li class="nav-item mt-3">
                <a class="nav-link" href="{{route('sessions.create')}}">Login</a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link" href="{{ route('users.create')}}">Register</a>
            </li>
            @endif
        </ul>
    </div>
</nav>