$(document).ready(function () {
    createSiteSettingsValidation();
    createUserValidation();
    updateUserValidation();     
  
    createBookCategory();
   
    editUserRoll();
   
});

function loader() {
    $("#loader").show();
    $("#overlay").show();
}
function removeLoader() {
    $("#loader").hide();
    $("#overlay").hide();
}

function createSiteSettingsValidation() {
    $("#site-settings-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "image") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else if ($(element).hasClass("hidden_method")) {
                error.insertAfter(element);
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            site_name: {
                required: true,
            },
            image: {
                required: true,
                image: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function createUserValidation() {
    $("#create-user-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "image") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else if ($(element).hasClass("hidden_method")) {
                error.insertAfter(element);
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/user-email-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        email: function () {
                            return $("#email").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        console.log(response);
                        if (json.valid) {
                            $('#create_user_btn').prop('disabled', false);
                            return true;
                        } else {
                            $('#create_user_btn').prop('disabled', true);
                            return '"This Email is already taken."';
                        }
                    },
                },
            },
            user_roll: {
                required: true,
                select2: true,
            },
            image: {
                required: true,
                image: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function updateUserValidation() {
    $("#edit-user-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "image") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else if ($(element).hasClass("hidden_method")) {
                error.insertAfter(element);
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/update-user-email-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        email: function () {
                            return $("#edit_email").val();
                        },
                        id: function () {
                            return $("#id").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        if (json.valid) {
                            $('#update_user_btn').prop('disabled', false);
                            return true;
                        } else {
                            $('#update_user_btn').prop('disabled', true);
                            return '"This Email is already taken."';
                        }
                    },
                },
            },
            user_roll: {
                required: true,
                select2: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}





function createBook() {
    $("#register-book-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
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
                required: true,
             
            },
            book_category_id: {
                required: true,
             
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function updateBook() {
    $("#edit-book-register-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
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
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

//create country
function createBookCategory() {
    $("#create-book-category-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            name: {
                required: true,
                maxlength: 50,
            },
          
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

//edit member
function updateMember() {
    $("#edit-member-register-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            full_name: {
                required: true,
            

            },
            nic: {
                required: true,
             

            },
            register_date: {
                required: true,

            },
            contact_no: {
                required: true
            },
            
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

//update get return
function updateGetReturn() {
    $("#edit-getreturn-register-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            book_title: {
                required: true,
            

            },
         
            no_of_book: {
                required: true,

            },
            get_date: {
                required: true
            },
            contact_no: {
                required: true
            },
            member: {
                required: true
            },
            return_status: {
                required: true
            },
            
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}





//edit user roll validation

function editUserRoll() {
    $("#update-user-roll").validate({
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            user_roll: {
                required: true,
                maxlength: 255,
            },
            is_active: {
                required: true,
            },
        },
        errorClass: "text-danger",
    });
}




