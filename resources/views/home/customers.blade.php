@extends('/layouts/main')

@push('css-dependencies')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
<style>
    body {
        background: #f5f5dc !important; /* Màu nền kem */
    }

    .container-fluid {
        background: #f5f5dc; /* Màu nền kem */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #d2b48c; /* Màu kem */
        color: #fff;
        font-weight: bold;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        background-color: #fff;
        border-radius: 0 0 10px 10px;
    }

    table.dataTable thead {
        background-color: #d2b48c; /* Màu kem */
        color: #fff;
    }

    table.dataTable tbody tr {
        transition: background-color 0.3s ease;
    }

    table.dataTable tbody tr:hover {
        background-color: #f5f5dc; /* Màu nền kem */
    }
</style>
@endpush

@push('scripts-dependencies')
<script src="/js/customers_table.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable();

        // Hiệu ứng chuyển động cho các hàng trong bảng
        $('#datatablesSimple tbody').on('mouseenter', 'tr', function() {
            $(this).css('transform', 'scale(1.02)');
            $(this).css('box-shadow', '0 4px 8px rgba(0, 0, 0, 0.2)');
        });

        $('#datatablesSimple tbody').on('mouseleave', 'tr', function() {
            $(this).css('transform', 'scale(1)');
            $(this).css('box-shadow', 'none');
        });
    });
</script>
@endpush

@section('content')

<div class="container-fluid mt-4 px-3">

    @include('/partials/breadcumb')

    <!-- inisial value -->
    <input type="hidden" name="username" id="username" value="{{ (isset($_GET['username'])) ? $_GET['username'] : '' }}">

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-fw fa-solid fa-users me-1"></i>
            Customers
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Họ và Tên</th>
                        <th>Tài Khoản</th>
                        <th>Email</th>
                        <th>Chức Vụ</th>
                        <th>Giới Tính</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Ngày Tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $row)
                    <tr>
                        <td>{{ $row->fullname }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->role->role_name }}</td>
                        <td>{{ $row->gender == "M" ? "Male" : "Female" }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
