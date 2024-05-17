<div class="d-flex flex-column flex-shrink-0 p-3 shadow fixed-top" style="width: 280px;height: 100vh">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center col-12 justify-content-center link-dark text-decoration-none">
        <span class="fs-4">鸡你太美</span>
    </a>
    <hr class="border-secondary">
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('dashboard') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard' ? 'active' : 'link-dark' }}">
                首页
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.music') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'admin.music' ? 'active' : 'link-dark' }}">
                音频库管理
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.image') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'admin.image' ? 'active' : 'link-dark' }}">
                图片管理
            </a>
        </li>
    </ul>
    <hr>
    <div class="p-3" style="position: absolute;bottom: 0">
        <a href="{{ route('logout') }}" class="nav-link link-dark">
            退出登录
        </a>
    </div>
</div>
