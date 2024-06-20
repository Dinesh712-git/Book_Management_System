$("#get-return-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#get-return-table_wrapper .col-md-6:eq(0)");

function updateGetReturn(div) {
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
            var members = JSON.parse($(div).attr("data-getreturn"));
            var modal = $("#edit-getreturn");
            console.log(members);
            modal.find('[name="id"]').val(members.id);
           
            modal.find('[name="no_of_book"]').val(members.no_of_book);
            modal.find('[name="get_date"]').val(members.get_date);
            modal.find('[name="contact_no"]').val(members.contact_no);
            modal.find('[name="member"]').val(members.member);

            modal
            .find('[name="book_title"]')
            .val(members.book_details.id)
            .trigger("change");
           
            modal
            .find('[name="return_status"]')
            .val(members.return_status)
            .trigger("change");
           
            modal.modal("show");
        }
    });
}

