window.addEventListener("DOMContentLoaded", (event) => {

    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {

        if (localStorage.getItem("sb|sidebar-toggle") == "true") {
            document.body.classList.toggle("sb-sidenav-toggled");
        }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});

$("button.auth_logout").click(function (e) {
    e.preventDefault();
    const form = document.getElementById("form_auth_logout");

    Swal.fire({
        title: "Bạn có chắc chắn không?",
        text: "Nhấn đăng xuất để thoát",
        confirmButtonText: "Đăng xuất",
        cancelButtonText: "Hủy",
        cancelButtonColor: "#d33",
        showCancelButton: true,
        confirmButtonColor: "#08a10b",
        timer: 10000,
    }).then((result) => {
        if (result.isConfirmed) {
            let timerInterval;
            Swal.fire({
                title: "Cảnh báo tự động đóng!",
                html: "Tôi sẽ đóng trong <b></b> mili giây.",
                timer: 1000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const b = Swal.getHtmlContainer().querySelector("b");
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft();
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                },
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    form.submit();
                }
            });
        } else {
            Swal.fire("Thất bại, yêu cầu hết thời gian", "", "info");
        }
    });
});
