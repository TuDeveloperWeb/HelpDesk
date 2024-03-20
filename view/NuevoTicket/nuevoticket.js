function init() { 
    $('#ticket-form').on("submit", function (e) {
        e.preventDefault();
        GuardarTicket();

    });
 }


$(document).ready(function() {

  var texto =$('#cat-sumernote').val();
 console.log("El texto es :"); 
console.log(texto);

    $('#cat-sumernote').summernote({
        height : 150 
    });


    $.post("../../controller/CategoriaController.php?op=combo", function (data,status) {
           $('#opCategoria').html(data);
        },
        
    );



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

            $('#txtTitulo').val('');
            $('#txtUsuario').val('');
            $('#cat-sumernote').summernote('reset');
            // $('#cat-sumernote').reset();
            
        }
    });


  }


  init();