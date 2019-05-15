//////////funcion atras ingreso doc
$(document).on("click", "#atras_emp_pago", function () {
  $('#formEmpPago').trigger("reset");   
  $('#modal_pago').find('input').val('');
  $('#modal_pago').modal('hide');
  $('#div_tabla_doc').css("display","none");
  $('#formapago').prop('selectedIndex',0);
  $('#tabla_docs tbody').empty();
  $('#obs_pago').val('');
  $('#rut_emp').prop('readonly', false);
  $('#val_emp').css("display","block");
  $('#atras_emp_pago').css("display","none");

  
});



//////////funcion cargar documentos empresa
$(document).ready(function() {
  $("#formEmpPago").submit(function() { 

    $.ajax({
      url: '../controles/controlCargarEmp.php',
      type: 'POST',
      data:$("#formEmpPago").serialize(),
      dataType:'json',
      success:function(result){
        $('#nom_emp').val(result[0].razon_social_emp);
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
    });


      
       $.ajax({
      url: '../controles/controlCargarDocsEmp.php',
      type: 'POST',
      data:$("#formEmpPago").serialize(),
      dataType:'json',
      success:function(result){
        var filas = Object.keys(result).length;
     
        for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
          var nuevafila= "<tr><td style='display:none;'>" +
          result[i].id_doc + "</td><td>" +
          result[i].nro_doc + "</td><td>" +
          result[i].monto_afecto_doc + "</td><td>" +
          result[i].monto_exento_doc + "</td><td>" +
          result[i].monto_iva_doc + "</td><td>" +
          result[i].monto_total_doc + "</td><td>" +
          result[i].fec_emi_doc + "</td><td>" +
          result[i].fec_ven_doc + "</td><td>" +
          result[i].tipo_doc+"</td><td>"+
          result[i].obs_doc + "</td><td>"+
          '<a  class="link-modal btn btn-outline-info" data-id="'+result[i].id_doc+'" data-doc="'+result[i].nro_doc+'" data-total="'+result[i].monto_total_doc+'" data-fec_ven="'+result[i].fec_ven_doc+'" data-toggle="modal" >Pagar</a></td></tr>'
     
          $("#tabla_docs").append(nuevafila);

        }
        $("#div_tabla_doc").css("display","block");
        $('#rut_emp').prop('readonly', true);
        $('#val_emp').css("display","none");
        $('#atras_emp_pago').css("display","block");
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
    });
    return false;
  });
}); 





//////////funcion atras ingreso doc
$(document).on("click", "#atras_emp_doc", function () {
     
  $('#formEmpDoc').trigger("reset");
  $('#formIngDoc').trigger("reset");
  $('#form_doc').css("display","none");
  $('#rut_emp').prop('readonly', false);
  $('#atras_emp_doc').css("display","none");
  $('#val_emp').css("display","block");

  
});


//////////funcion cargar empresa
$(document).ready(function() {
  $("#formEmpDoc").submit(function() { 
      
       $.ajax({
      url: '../controles/controlCargarEmp.php',
      type: 'POST',
      data:$("#formEmpDoc").serialize(),
      dataType:'json',
      success:function(result){
        $('#nom_emp').val(result[0].razon_social_emp);
        $('#emp').val(result[0].id_emp);
        $('#mon_men').val(result[0].monto_mensual_emp);
        $('#form_doc').css("display","block");
        $('#rut_emp').prop('readonly', true);
        $('#val_emp').css("display","none");
        $('#atras_emp_doc').css("display","block");
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
    });
    return false;
  });
}); 



//////////funcion pago documento
$(document).ready(function() {
  $("#formIngPago").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlPagoDoc.php',
      data:$("#formIngPago").serialize(),
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
                    swal("Pago Ingresado", msg, "success");
                    $('#modal_pago').find('input').val('');
                    $('#modal_pago').modal('hide');
                    $('#div_tabla_doc').css("display","none");
                    $('#formEmpPago').trigger("reset");
                    $('#formapago').prop('selectedIndex',0);
                    $('#tabla_docs tbody').empty();
                    $('#obs_pago').val('');
                    $('#rut_emp').prop('readonly', false);
                    $('#val_emp').css("display","block");
                    $('#atras_emp_pago').css("display","none");
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



//////////funcion cargar documento para pago
$(document).on("click", ".link-modal", function () {
     var nro_doc = $(this).data('doc');
     var id_doc = $(this).data('id');
     var total = $(this).data('total');
     var fec_ven = new Date($(this).data('fec_ven'));
     var fec = Date.now();
     console.log(nro_doc);
     console.log(id_doc);
     $("#nro_doc").text(nro_doc);
     $("#id_doc").val(id_doc);
     $("#monto_total").val(total);

     fec_ven < fec ? $('#ven_doc').css("display","block") : $('#ven_doc').css("display","none");

    $.ajax({
      url: '../controles/controlDatosDoc.php',
      type: 'POST',
      data: {"doc":id_doc},
      dataType:'json',
      success:function(result){
        $('#est_doc').val(result[0].est);
        $('#monto_pagado').val(result[0].suma);
      }
    })





    $('#modal_pago').modal('show');
});






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
                    swal("Documento Ingresado", msg, "success");
                    $('#formEmpDoc').trigger("reset");
                    $('#formIngDoc').trigger("reset");
                    $('#form_doc').css("display","none");
                    $('#rut_emp').prop('readonly', false);
                    $('#atras_emp_doc').css("display","none");
                    $('#val_emp').css("display","block");

                    //$('#obs_doc').val('');
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

