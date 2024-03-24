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
        url: "../../controller/TicketController.php?action=store",
        data: formData,
        contentType:false,
        processData: false,
        success: function (response) {
            swal({
                title: "Correcto!",
                text: "Registrado Correctamente",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Acpetar"
                
            });
            // $('#cat-sumernote').reset();
        },
        complete: function () {
            $('#txtTitulo').val('');
            $('#txtUsuario').val('');
            $('#cat-sumernote').summernote('reset');
        }
    });


  }


  init();