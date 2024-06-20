$("#book-category-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#book-category-table_wrapper .col-md-6:eq(0)");

function editBookCategory(div) {
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want edit this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, edit it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var category = JSON.parse($(div).attr("data-book-category"));
            var modal = $("#edit-book-category");
            modal.find('[name="id"]').val(category.id);
            modal.find('[name="name"]').val(category.name);
           
            modal.modal("show");
        }
    });
}

