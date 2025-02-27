import { previewImage } from "/js/image_preview.js";

$("button.detail").click(function (event) {
    var id = $(this).attr("data-id");
    setVisible("#loading", true);

    $.ajax({
        url: "/product/data/" + id,
        method: "get",
        dataType: "json",
        success: function (res) {
            $("#modal-image").attr("src", "/storage/" + res["image"]);
            $(".text-uppercase").html(res["product_name"]);
            $(".orientation").html(res["orientation"]);
            $(".description").html(res["description"]);
            $(".stock").html(
                "Số lượng: " + "<em>" + res["stock"] + " cốc" + "</em>"
            );
            if (res["discount"] == 0) {
                $(".price").html(
                    "Giá: " + "<strong>" + res["price"] + "VNĐ" + "</strong>"
                );
                $(".discount").html(
                    "Giảm giá: " +
                        "<em class='text-danger'>Không có voucher</em>"
                );
            } else {
                $(".price").html(
                    "Giá: " + "<strong class='me-2'>" + ((100 - res["discount"]) / 100) * res["price"] + "VNĐ" + "</strong>"+ "<br>" + "Giá gốc: " + "<strong class='strikethrough'>" + res["price"] + "VNĐ" + "</strong>"
                );
                $(".discount").html(
                    "Giảm giá: " +
                        "<em class='text-danger'>" +
                        res["discount"] +
                        "%" +
                        "</em>"
                );
            }

            $("#ProductDetailModal").modal("show");
            setVisible("#loading", false);
        },
    });
});

const setVisible = (elementOrSelector, visible) =>
    ((typeof elementOrSelector === "string"
        ? document.querySelector(elementOrSelector)
        : elementOrSelector
    ).style.display = visible ? "block" : "none");

$("#image").on("change", function () {
    previewImage({
        image: "image",
        image_preview: "image-preview",
        image_preview_alt: "Product Image",
    });
});

// Xử lý sự kiện bấm nút "Save Changes"
$("#button_edit_product").click(function (e) {
    e.preventDefault();
    Swal.fire({
        title: "Bạn có chắc chắn?",
        text: "Sau khi thực hiện, dữ liệu sản phẩm sẽ được thay đổi",
        icon: "warning",
        confirmButtonText: "Xác nhận",
        cancelButtonColor: "#d33",
        showCancelButton: true,
        confirmButtonColor: "#08a10b",
        timer: 10000,
    }).then((result) => {
        if (result.isConfirmed) {
            $("#form_edit_product").submit();
        } else if (result.isDismissed) {
            Swal.fire("Hành động đã bị hủy", "", "info");
        }
    });
});

// Xử lý sự kiện bấm nút "Xóa sản phẩm"
$("form[action*='delete_product'] button[type='submit']").click(function (e) {
    e.preventDefault();
    Swal.fire({
        title: "Bạn có chắc chắn?",
        text: "Sau khi thực hiện, sản phẩm sẽ bị xóa",
        icon: "warning",
        confirmButtonText: "Xác nhận",
        cancelButtonColor: "#d33",
        showCancelButton: true,
        confirmButtonColor: "#08a10b",
        timer: 10000,
    }).then((result) => {
        if (result.isConfirmed) {
            $(this).closest('form').submit();
        } else if (result.isDismissed) {
            Swal.fire("Hành động đã bị hủy", "", "info");
        }
    });
});
