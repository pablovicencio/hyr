
//////////funcion calcular monto total
function calculoTotal()
{
      var afecto = $('#afecto').val() == '' ? 0 : $('#afecto').val();
      var exento = $('#exento').val() == '' ? 0 : $('#exento').val();
      var iva = $('#iva').val() == '' ? 0 : $('#iva').val();


       var total = parseInt(afecto) + parseInt(exento) + parseInt(iva);
        $('#total').val(parseInt(total));
}
//////////funcion calcular monto iva
function calculoIva()
{
        var iva = parseInt($('#afecto').val()) * 0.19;
        $('#iva').val(parseInt(iva));
        calculoTotal();
}
//////////funcion cargar monto_mensual
function montoEmp(emp)
{
      
       $.ajax({
      url: '../controles/controlCargarMontoEmp.php',
      type: 'POST',
      data: {"emp":emp},
      dataType:'json',
      success:function(result){
        $('#mon_men').val(result[0].monto_mensual_emp);
  }
  })
}

//////////funcion ingresar documento
$(document).ready(function() {
  $("#formIngDoc").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlIngDoc.php',
      data:$("#formIngDoc").serialize(),
      success: function (result) { 
      var msg = result.trim();

        switch(msg) {
                case '-1':
                    swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                    break;
                case '-2':
                    swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");
                    break;
                default :
                    $('#form').find('input').val('');
                    swal("Documento Ingresado", msg, "success");
                    break;
            }
      },
      error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
    });
    return false;
  });
}); 

