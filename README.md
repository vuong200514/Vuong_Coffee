# VuongCoffee

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/vuong200514/Vuong_Coffee/raw/main/public/storage/readme/heading.png" width="80%" alt="VuongCoffee Logo"></a></p>

## Giới thiệu

VuongCoffee là một trang web thương mại điện tử chuyên cung cấp các sản phẩm cà phê chất lượng cao. Trang web được xây dựng trên nền tảng Laravel, một framework PHP mạnh mẽ và linh hoạt, giúp việc phát triển trở nên dễ dàng và thú vị hơn.

## Hệ thống Quản lý Quán Nước

Hệ thống này giúp quản lý sản phẩm, đơn hàng và các giao dịch của người dùng, với phân quyền rõ ràng giữa **Admin** và **Guest**. Admin có quyền quản lý đầy đủ các chức năng của hệ thống, trong khi Guest có quyền truy cập vào các tính năng cơ bản.
<p>Tài liệu dự án chi tiết: <a href='https://docs.google.com/document/d/1voYJo4Vo9urhTCUrJrJIkiIk8pKVlV28EWACxGynyVw/edit?usp=sharing'>here</a></p>
<p>Tài liệu API: <a href='https://github.com/vuong200514/Vuong_Coffee/wiki'>here</a></p>
<p>Repo gốc: <a href='https://github.com/vuong200514/Vuong_Coffee'>here</a></p>
<p>Trang web của chúng tôi: <a href='https://zany-space-spoon-9r9v7j6v4xr2pg5v.app.github.dev/'>here</a></p>

* **Công nghệ sử dụng**:
     * Workspace: Github Workspace, VsCode
     * Database: Aiven
     * Deploy: Github
     * Framework: Laravel

## Đường dẫn đến website của chúng tôi:

<h3>Repo: <a href='https://github.com/vuong200514/Vuong_Coffee'>Main_Repo</a></h3>
<h3>Website: <a href='https://zany-space-spoon-9r9v7j6v4xr2pg5v.app.github.dev'>Vuong_Coffee</a></h3>

### **Chức năng chung** (Cả Admin và Guest đều có)

* **Quản lý Tài khoản**:
    * Đăng ký tài khoản (User).
    * Đăng nhập tài khoản (User).
    * Chỉnh sửa thông tin cá nhân (User).
    * Đổi mật khẩu (User).
* **Xem Sản phẩm**:
    * Xem danh sách sản phẩm (Product).
    * Xem chi tiết sản phẩm (Product).
    * Xem danh mục sản phẩm (Category).

---

### **Phân quyền**

#### **Admin**

Admin có quyền quản lý toàn bộ hệ thống và thực hiện các chức năng sau:

1.  **Quản lý Người dùng (User)**:
    * Xem danh sách người dùng.
2.  **Quản lý Sản phẩm (Product)**:
    * Thêm sản phẩm mới.
    * Chỉnh sửa thông tin sản phẩm.
    * Xóa sản phẩm.
    * Quản lý danh mục sản phẩm (Category).
3.  **Quản lý Đơn hàng (Order)**:
    * Xem danh sách đơn hàng.
    * Cập nhật trạng thái đơn hàng (Status).
    * Xem ghi chú đơn hàng(Note).
4.  **Quản lý Doanh thu (Transaction)**:
    * Xem báo cáo doanh thu.
    * Quản lý các khoản thu chi.
5.  **Quản lý Đánh giá (Review)**:
    * Xem danh sách đánh giá.

#### **Guest**

Guest có quyền truy cập các chức năng sau:

1.  **Quản lý Đơn hàng (Order)**:
    * Tạo đơn hàng mới.
    * Xem lịch sử đơn hàng.
    * Xem chi tiết đơn hàng.
    * Hủy đơn hàng (nếu có thể).
2.  **Đánh giá Sản phẩm (Review)**:
    * Gửi đánh giá và nhận xét về sản phẩm đã mua.
    * Chỉnh sửa đánh giá đã gửi.
3.  **Xem trạng thái đơn hàng (Status)**.

---

## Mô hình Use_Case
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/vuong200514/Vuong_Coffee/raw/main/public/storage/readme/use-case.png" width="50%" alt="VuongCoffee Logo"></a></p>

---

## Một số hình ảnh

### Home

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/vuong200514/Vuong_Coffee/raw/main/public/storage/readme/home.png" width="80%" alt="VuongCoffee Logo"></a></p>

### Product

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/vuong200514/Vuong_Coffee/raw/main/public/storage/readme/product.png" width="80%" alt="VuongCoffee Logo"></a></p>

---

## Hướng dẫn cài đặt

1.  **Clone repository**:

    ```bash
    git clone [https://github.com/vuong200514/VuongCoffee.git](https://github.com/vuong200514/VuongCoffee.git)
    cd VuongCoffee
    ```

2.  **Cài đặt các gói phụ thuộc**:

    ```bash
    composer install
    npm install
    ```

3.  **Cấu hình môi trường**:

    * Tạo file `.env` từ file mẫu `.env.example`:

        ```bash
        cp .env.example .env
        ```

    * Cập nhật các thông tin cấu hình trong file `.env` (database, mail, etc.).

4.  **Tạo khóa ứng dụng**:

    ```bash
    php artisan key:generate
    ```

5.  **Chạy các migration và seed dữ liệu**:

    ```bash
    php artisan migrate --seed
    ```

6.  **Khởi động server**:

    ```bash
    php artisan serve
    ```

## Tài liệu và Hỗ trợ

* [Tài liệu Laravel](https://laravel.com/docs)
* [Laravel Bootcamp](https://bootcamp.laravel.com)
* [Laracasts](https://laracasts.com)

## Liên hệ

<a href="https://github.com/vuong200514">Đào Mạnh Vương - 23010586</a>

<p>I'M from PHENIKAA UNIVERSITY</p>
