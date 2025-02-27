<style>
    .sb-sidenav {
    background-color: #f5f0e3;
    color: #5c4a2e;
}

.sb-sidenav .sb-sidenav-menu {
    padding: 20px;
}

.sb-sidenav .sb-sidenav-menu-heading {
    color: #8d785f;
    font-weight: bold;
    margin-bottom: 10px;
    padding: 0 10px;
}

.sb-sidenav .nav-link {
    color: #5c4a2e;
    padding: 10px 15px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.sb-sidenav .nav-link:hover {
    background-color: #e6e0d2;
    color: #7a6445;
}

.sb-sidenav .nav-link .sb-nav-link-icon i {
    margin-right: 10px;
    width: 20px;
    text-align: center;
}

.sb-sidenav .nav-link.active {
    background-color: #d7cebd;
    color: #7a6445;
}

.sb-sidenav .collapse .nav-link {
    /* padding-left: 30px; */
}

.sb-sidenav-footer {
    background-color: #e6e0d2;
    color: #5c4a2e;
    padding: 10px 15px;
    text-align: center;
}

.sb-sidenav-footer .small {
    color: #8d785f;
    margin-bottom: 5px;
}

.sb-sidenav .nav-link {
    overflow: hidden;
    position: relative;
}

.sb-sidenav .nav-link::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.2);
    transition: left 0.3s ease;
    z-index: 1;
}

.sb-sidenav .nav-link:hover::before {
    left: 0;
}

.sb-sidenav {
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sb-sidenav .sb-sidenav-collapse-arrow i {
    transition: transform 0.3s ease;
}

.sb-sidenav .nav-link.collapsed .sb-sidenav-collapse-arrow i {
    transform: rotate(-90deg);
}

.sb-sidenav::-webkit-scrollbar {
    width: 8px;
}

.sb-sidenav::-webkit-scrollbar-track {
    background: #f0e8db;
}

.sb-sidenav::-webkit-scrollbar-thumb {
    background-color: #d7cebd;
    border-radius: 4px;
}
</style>
<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            @can("is_admin")
            <div class="sb-sidenav-menu-heading">Quản trị viên</div>
            <a class="nav-link" href="/home">
                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-tachometer-alt"></i></div>
                Bảng điều khiển
            </a>
            <a class="nav-link" href="/home/customers">
                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-solid fa-users"></i></div>
                Khách hàng
            </a>
            <a class="nav-link" href="/transaction">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-dollar-sign"></i></div>
                Giao dịch
            </a>
            @else
            <div class="sb-sidenav-menu-heading">Khách hàng</div>
            <a class="nav-link" href="/home">
                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-home-alt"></i></i></div>
                Trang chủ
            </a>
            @endcan

            <div class="sb-sidenav-menu-heading">Giao diện</div>
            <a class="nav-link" href="/product">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-dumpster"></i></div>
                Sản phẩm
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
              aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-columns"></i></div>
                Đơn hàng
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-fw fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/order/order_data">Dữ liệu đơn hàng</a>
                    <a class="nav-link" href="/order/order_history">Lịch sử đơn hàng</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Đang đăng nhập với tư cách:</div>
        {{ auth()->user()->role->role_name }}
    </div>
</nav>
