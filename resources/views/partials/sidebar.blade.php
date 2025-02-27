<style>
    .sb-sidenav {
        background: #f5f0e3; color: #5c4a2e; box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }
    .sb-sidenav-menu { padding: 20px; }
    .sb-sidenav-menu-heading { color: #8d785f; font-weight: bold; margin-bottom: 10px; padding: 0 10px; }
    .nav-link {
        color: #5c4a2e; padding: 10px 15px; position: relative; overflow: hidden;
        transition: background 0.3s, color 0.3s;
    }
    .nav-link:hover { background: #e6e0d2; color: #7a6445; }
    .nav-link::before {
        content: ""; position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
        background: rgba(255, 255, 255, 0.2); transition: left 0.3s; z-index: 1;
    }
    .nav-link:hover::before { left: 0; }
    .nav-link.active { background: #d7cebd; color: #7a6445; }
    .sb-sidenav-footer {
        background: #e6e0d2; color: #5c4a2e; padding: 10px 15px; text-align: center;
    }
    .sb-sidenav-footer .small { color: #8d785f; margin-bottom: 5px; }
    .sb-sidenav .sb-sidenav-collapse-arrow i { transition: transform 0.3s; }
    .collapsed .sb-sidenav-collapse-arrow i { transform: rotate(-90deg); }
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #f0e8db; }
    ::-webkit-scrollbar-thumb { background: #d7cebd; border-radius: 4px; }
</style>

<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            @can("is_admin")
                <div class="sb-sidenav-menu-heading">Quản trị viên</div>
                <a class="nav-link" href="/home"><i class="fas fa-tachometer-alt"></i> Bảng điều khiển</a>
                <a class="nav-link" href="/home/customers"><i class="fas fa-users"></i> Khách hàng</a>
                <a class="nav-link" href="/transaction"><i class="fa-solid fa-dollar-sign"></i> Giao dịch</a>
            @else
                <div class="sb-sidenav-menu-heading">Khách hàng</div>
                <a class="nav-link" href="/home"><i class="fas fa-home"></i> Trang chủ</a>
            @endcan
            
            <div class="sb-sidenav-menu-heading">Giao diện</div>
            <a class="nav-link" href="/product"><i class="fa-solid fa-dumpster"></i> Sản phẩm</a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts">
                <i class="fas fa-columns"></i> Đơn hàng
                <i class="fas fa-angle-down sb-sidenav-collapse-arrow"></i>
            </a>
            <div class="collapse" id="collapseLayouts" data-bs-parent="#sidenavAccordion">
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
