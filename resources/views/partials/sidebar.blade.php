<style>
.sb-topnav {
    background: #f0d593; color: #5c4a2e; padding: 10px 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.sb-topnav .navbar-brand, .sb-topnav .btn-link, .sb-topnav .nav-item .nav-link {
    color: #5c4a2e; transition: color 0.3s;
}
.sb-topnav .navbar-brand:hover, .sb-topnav .btn-link:hover, .sb-topnav .nav-item .nav-link:hover {
    color: #7a6445;
}
.sb-topnav .dropdown-menu {
    background: #f5f0e3; border: none; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}
.sb-topnav .dropdown-item {
    color: #5c4a2e; transition: background 0.3s, color 0.3s;
}
.sb-topnav .dropdown-item:hover {
    background: #e6e0d2; color: #7a6445;
}
.sb-topnav .img-profile {
    border: 2px solid #d7cebd;
}
@media (max-width: 768px) {
    .sb-topnav .navbar-brand { font-size: 1rem; }
    .sb-topnav .form-inline { display: none; }
}
</style>

<nav class="sb-topnav navbar navbar-expand">
    <a class="navbar-brand ps-3" href="/home">VuongCoffee</a>
    <button class="btn btn-link btn-light btn-sm order-1 order-lg-0 me-3 me-lg-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        {{ auth()->user()->username }}
    </div>
    <ul class="navbar-nav ms-auto me-1 me-lg-2">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown">
                <img width="40" height="40" class="img-profile rounded-circle" src="/{{ 'storage/' . auth()->user()->image }}">
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="/profile/my_profile"><i class="fas fa-user-alt fa-sm fa-fw text-gray-400 me-2"></i>Hồ sơ của tôi</a></li>
                <li><a class="dropdown-item" href="/profile/change_password"><i class="fas fa-key fa-sm fa-fw text-gray-400 me-2"></i>Đổi mật khẩu</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <form action="/auth/logout" method="post" id="form_auth_logout">
                        @csrf
                        <button type="submit" class="dropdown-item auth_logout"><i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400 me-2"></i>Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
