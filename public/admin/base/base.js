function confirmDelete() {
    return new Promise((resolve, reject) => {
        Swal.fire({
            title: "Bạn có chắc không?",
            text: "Bạn sẽ không thể khôi phục lại điều này!",
            icon: "Cảnh báo",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Vâng, xóa nó!",
        }).then((result) => {
            if (result.isConfirmed) {
                resolve(true);
            } else {
                reject(false);
            }
        });
    });
}
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(() => {
    $(document).on("click", ".btn-delete", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        confirmDelete()
            .then(function () {
                $(`#form-delete${id}`).submit();
            })
            .catch();
    });
});
