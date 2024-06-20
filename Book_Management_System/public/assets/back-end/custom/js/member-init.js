$("#member-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#member-table_wrapper .col-md-6:eq(0)");

function updateMember(div) {
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
            var members = JSON.parse($(div).attr("data-member"));
            var modal = $("#edit-member");
            modal.find('[name="id"]').val(members.id);
            modal.find('[name="full_name"]').val(members.full_name);
            modal.find('[name="nic"]').val(members.nic);
            modal.find('[name="register_date"]').val(members.register_date);
            modal.find('[name="contact_no"]').val(members.contact_no);
           
            modal.modal("show");
        }
    });
}

