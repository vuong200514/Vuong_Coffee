<nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">{{ auth()->user()->role_id == 1 ? "Admin" : "Customer" }}</li>
      <li class="breadcrumb-item">{{ ucwords(explode("/",Request::path())[0])}}</li>
      <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
    </ol>
  </nav>

  <hr class="mt-0 mb-4">

  <style>
      .main-breadcrumb {
          background-color: #f5f0e3;
          padding: 10px 20px;
          border-radius: 5px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .breadcrumb {
          background-color: transparent;
          margin-bottom: 0;
      }

      .breadcrumb-item {
          font-size: 1rem;
          color: #5c4a2e;
      }

      .breadcrumb-item a {
          color: #5c4a2e;
          text-decoration: none;
          transition: color 0.3s ease;
      }

      .breadcrumb-item a:hover {
          color: #3e2f1c;
      }

      .breadcrumb-item.active {
          color: #997720;
          font-weight: bold;
      }

      hr.mt-0.mb-4 {
          border-top: 1px solid #e0d8c3;
      }
  </style>
