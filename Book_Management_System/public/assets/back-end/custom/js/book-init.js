

$("#book-table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#book-table_wrapper .col-md-6:eq(0)");

function updateBook(div) {
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
            var book = JSON.parse($(div).attr("data-book"));
            var modal = $("#edit-book");
            modal.find('[name="id"]').val(book.id);
            modal.find('[name="title"]').val(book.title);
            modal.find('[name="author"]').val(book.author);
            modal.find('[name="price"]').val(book.price);
            modal.find('[name="stock"]').val(book.stock);
            modal.find('[name="book_category_id"]').val(book.book_category_id);

            
            modal.modal("show");
            validationEditAgent();
        }

    });

}

function validationEditBook(){
   
    $("#edit-book-register-form").validate({
        errorPlacement: function(error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            title: {
                required: true,
            

            },
            author: {
                required: true,
             

            },
            price: {
                required: true,

            },
            stock: {
                required: true
            },
            book_category_id: {
                required: true
            },
        },
        errorClass: "text-danger",
    });
}


function deleteBook(url){
  //console.log(url);

  Swal.fire({
    title: "Are you sure?",
    text: "Do you want Delete this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete it!",
}).then((result) => {
    if (result.isConfirmed) {
        loader();
        window. location. replace(url)
       
    }

});



}