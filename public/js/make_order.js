const setVisible = (elementOrSelector, visible) =>
    ((typeof elementOrSelector === "string"
        ? document.querySelector(elementOrSelector)
        : elementOrSelector
    ).style.display = visible ? "block" : "none");

function hideMessage(payment_method) {
    if (
        $("#" + payment_method + "_alert").html() != null &&
        $("#" + payment_method + "_alert").css("display") != "none"
    ) {
        $("#" + payment_method + "_alert").css("display", "none");
    } else if (payment_method == "cod") {
        $("#bank_alert").css("display", "block");
    } else {
        $("#cod_alert").css("display", "block");
    }
}

function hideBankMessage() {
    $("#bank_id_alert").css("display") != "none";
}

var sub_total;
var total;
var shipping = 15000;

function myCounter() {
    var quantityElement = document.getElementById("quantity");
    var priceElement = document.getElementById("price");

    if (!quantityElement || !priceElement) {
        console.error("Không tìm thấy phần tử quantity hoặc price");
        return;
    }

    var num = parseInt(quantityElement.value);
    var price = parseInt(priceElement.getAttribute("data-truePrice"));

    sub_total = price * num;
    total = sub_total + shipping;

    $("#sub_total").html(sub_total);
    $("#total").html(total);
    $("#total_price").val(total);

    refresh_data({ sub_total: sub_total, total: total });
}

function refresh_data({ sub_total = 0, shipping = 15000, total = 0 }) {
    if (total >= 0) {
        $("#total_price").val(total);
        $("#total").html(total);
    }
    if (sub_total >= 0) {
        $("#sub-total").html(sub_total);
    }
    if (shipping >= 0) {
        $("#shipping").attr("data-shippingCost", shipping);
        $("#shipping").html(shipping + " VND");
    }
}

var product_id;
var destinasi;
var quantity;

var currentCity = "0";
$("#city").on("click", function (e) {
    if ($(this).val() != currentCity) {
        currentCity = $(this).val();
        setCity();
    }
});

function setCity() {
    product_id = $("#quantity").attr("data-productId");
    destinasi = $("#city").val();
    quantity = $("#quantity").val();
}

function getCity(province_id) {
    var op = $("#city");
    op.html('<option value="0" selected="selected">Chọn Quận/Huyện</option>');

    if (province_id === '1') {
        op.append('<option value="101">Ba Đình</option>');
        op.append('<option value="102">Hoàn Kiếm</option>');
        op.append('<option value="103">Tây Hồ</option>');
    } else if (province_id === '2') {
        op.append('<option value="201">Quận 1</option>');
        op.append('<option value="202">Quận 3</option>');
        op.append('<option value="203">Quận 5</option>');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const orderForm = document.querySelector('form[action^="/order/make_order"]');

    orderForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(orderForm);
        const data = Object.fromEntries(formData.entries());

        const quantity = parseInt(document.getElementById('quantity').value);
        const price = parseFloat(document.getElementById('price').getAttribute('data-truePrice'));
        const shippingCost = 15000;
        const totalPrice = (quantity * price) + shippingCost;

        document.getElementById('total_price').value = totalPrice;

        if (confirm(`Xác nhận đặt hàng với tổng tiền: ${totalPrice} VND?`)) {
            orderForm.submit();
        }
    });
});

