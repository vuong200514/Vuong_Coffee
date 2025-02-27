<style>
    .sb-topnav {
    background-color: #f0d593;
    color: #5c4a2e;
    padding: 10px 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.sb-topnav .navbar-brand {
    color: #7a6445;
    font-weight: bold;
    font-size: 1.2rem;
    transition: color 0.3s ease;
}

.sb-topnav .navbar-brand:hover {
    color: #8d612c;
}

.sb-topnav .btn-link {
    color: #5c4a2e;
    transition: color 0.3s ease;
}

.sb-topnav .btn-link:hover {
    color: #7a6445;
}

.sb-topnav .form-inline {
    color: #5c4a2e;
}

.sb-topnav .nav-item .nav-link {
    color: #5c4a2e;
    transition: color 0.3s ease;
}

.sb-topnav .nav-item .nav-link:hover {
    color: #7a6445;
}

.sb-topnav .dropdown-menu {
    background-color: #f5f0e3;
    border: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.sb-topnav .dropdown-item {
    color: #5c4a2e;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.sb-topnav .dropdown-item:hover {
    background-color: #e6e0d2;
    color: #7a6445;
}

.sb-topnav .dropdown-divider {
    border-color: #d7cebd;
}

.sb-topnav .img-profile {
    border: 2px solid #d7cebd;
}

@media (max-width: 768px) {
    .sb-topnav .navbar-brand {
        font-size: 1rem;
    }

    .sb-topnav .form-inline {
        display: none;
    }
}
</style>
<nav class="sb-topnav navbar navbar-expand">

    <a class="navbar-brand ps-3" href="/home">VuongCoffee</i> </a>

    <button class="btn btn-link btn-light btn-sm order-1 order-lg-0 me-3 me-lg-0" id="sidebarToggle" href="#!"><i
        class="fas fa-bars"></i></button>

    <div style="color: black;" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">{{
        auth()->user()->username }}</div>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-1 me-lg-2" style="margin-right: 0;">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false"><img width="40px" height="40px" class="img-profile rounded-circle"
            src="{{ '/'.'storage/' . auth()->user()->image }}"></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/profile/my_profile"><i class="fas fa-user-alt fa-sm fa-fw text-gray-400"
                style="margin-right: 10px;"></i>Hồ sơ của tôi</a></li>
            <li><a class="dropdown-item" href="/profile/change_password"><i class="fas fa-key fa-sm fa-fw text-gray-400"
                style="margin-right: 10px;"></i>Đổi mật khẩu</a></li>
            <li>
            <hr class="dropdown-divider" />
            </li>
            <li>
            <form action="/auth/logout" method="post" id="form_auth_logout">
                @csrf
                <button type="submit" class="dropdown-item auth_logout" style="cursor: pointer;"><i
                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="margin-right: 10px;"></i>Đăng xuất</button>
            </form>
            </li>
        </li>
    </ul>
</nav>
