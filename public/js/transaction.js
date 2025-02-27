$(".button_edit_transaction").click(function () {
    var id = $(this).attr("data-transactionId");

    if ($(this).attr("data-isOutcome") == "0") {
        Swal.fire("Không thể chỉnh sửa kế toán sai là đi tò");
    } else {
        window.location = "/transaction/edit_outcome/" + id;
    }
});
