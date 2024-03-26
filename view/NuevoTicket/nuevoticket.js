function init() { 
    $('#ticket-form').on("submit", function (e) {
        e.preventDefault();
        GuardarTicket();

    });
 }


$(document).ready(function() {

    $('#cat-sumernote').summernote({
        height : 150 
    });


    $.ajax({
        type: "POST",
        url: "../../controller/CategoriaController.php",
        data: {op:"combo"},
        success: function (response) {
            $('#opCategoria').html(response);
        }
    });



    

});

function GuardarTicket() {
    var formData = new FormData($('#ticket-form')[0]);
    $.ajax({
        type: "POST",
        url: "../../routes/api.php?action=store",
        data: formData,
        contentType:false,
        processData: false,
        success: function (response) {
            const  {success,message} = JSON.parse(response);
            if (success) {
                swal({
                    title: "Correcto!",
                    text: message,
                    type: "success",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Acpetar"
                });

            }
            
        },
        error: function (xhr, status, error) {
            var errorMessage = JSON.parse(xhr.responseText).message;
            swal({
                title: "Error",
                text: errorMessage,
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Aceptar"
            });
        },
        complete: function () {
            $('#txtTitulo').val('');
            $('#cat-sumernote').summernote('reset');
        }
    });


  }


  init();