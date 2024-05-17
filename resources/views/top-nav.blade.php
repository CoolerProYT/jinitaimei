<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center d-md-flex justify-content-center" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item mx-4">
                    <a class="nav-link {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">首页</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'music' ? 'active' : '' }}" href="{{ route('music') }}">音频库</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'image' ? 'active' : '' }}" href="{{ route('image') }}">图库</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
