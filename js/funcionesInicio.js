
//////////funcion notificar documentos pendiente
function not_doc(id_doc){
  swal({
                  title: "Advertencia de Notificación",
                  text: "Se enviara un correo al cliente, informando acerca de la deuda ¿Estas seguro que deseas notificarlo?",
                  icon: "warning",
                  buttons: ["Cancelar", "Aceptar"],
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {

    $.ajax({
      url: '../controles/controlNotificarDoc.php',
      type: 'POST',
      data:{ id_doc: id_doc},
      success:function(result){
        var msg = result.trim();

        switch(msg) {
                case '-2':
                    swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");
                    break;
                default :
                    swal("Documento Notificado", msg, "success");

                    //$('#obs_doc').val('');
                    break;
            }
    },
    error: function(){
                swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
        }
        });
      return false;
    }
    });
  }



 //CARGA DE GIF INICIO
  $(document).ajaxStart(function() {
    $("#main").hide();
    $("#loading").show();
       }).ajaxStop(function() {
    $("#loading").hide();
    $("#main").show();
    }); 



//INSTANCIAS DE DATATABLE

$(document).ready(function () {
    $('#doc_ven').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      }
    });
    $('.dataTables_length').addClass('bs-select');
  });