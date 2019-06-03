
//id del perfil session enviado por src
var session = document.getElementById("funCob").src.match(/\w+=\w+/g);
var perfil = session[0].split("=");




  //////////funcion cambio doc boleta impuesto
  $(document).on("change", "#tipo_doc", function () {
    //Factura
    if ($('#tipo_doc').val() == 1) {
      $('#lblAfecto').text('Monto Afecto');
      //$('#exento').val("0");
      $('#lblExento').css("visibility","visible");
      $('#exento').css("display","block");
      $('#impbol').css("visibility","hidden");
      $('#lblIVA').text('Monto IVA');
      }

    //Boleta
    if ($('#tipo_doc').val() == 2) {
      $('#lblAfecto').text('Monto Neto');
      $('#exento').val("0");
      $('#lblExento').css("visibility","hidden");
      $('#exento').css("display","none");
      $('#impbol').css("visibility","visible");
      $('#lblIVA').text('Monto Retención');
      }

    
  });
  

  //CARGA DE GIF ING DOC
  $(document).ajaxStart(function() {
    $("#formIngDoc").hide();
    $("#loading").show();
       }).ajaxStop(function() {
    $("#loading").hide();
    $("#formIngDoc").show();
    }); 

    $(document).ajaxStart(function() {
    $("#formEmpDoc").hide();
    $("#loading").show();
       }).ajaxStop(function() {
    $("#loading").hide();
    $("#formEmpDoc").show();
    }); 

  //CARGA DE GIF PAGO DOC
  $(document).ajaxStart(function() {
    $("#formIngPago").hide();
    $("#loading").show();
       }).ajaxStop(function() {
    $("#loading").hide();
    $("#formIngPago").show();
    }); 

  $(document).ajaxStart(function() {
    $("#formEmpPago").hide();
    $("#loading").show();
       }).ajaxStop(function() {
    $("#loading").hide();
    $("#formEmpPago").show();
    }); 

  //CARGA DE GIF CONSULTA DOC
  $(document).ajaxStart(function() {
    $("#formEmpConsulta").hide();
    $("#loading").show();
       }).ajaxStop(function() {
    $("#loading").hide();
    $("#formEmpConsulta").show();
    }); 




//////////funcion cargar movimientos documentos Modal
$(document).on("click", "#btn_modal_consulta", function () {
  $('#tabla_mov_doc tbody').empty();
     var nro_doc = $(this).data('doc');
     var id_doc = $(this).data('id');
     var total = $(this).data('total');
     var afecto = $(this).data('afecto');
     var exento = $(this).data('exento');
     var iva = $(this).data('iva');
     var fec_ven = new Date($(this).data('fec_ven'));
     var fec = Date.now();
     $("#nro_doc").text(nro_doc);
     $("#id_doc").val(id_doc);
     $("#monto_total").val(total);
     $("#monto_afecto").val(afecto);
     $("#monto_exento").val(exento);
     $("#monto_iva").val(iva);
     $("#tipo_modal").text($(this).data('tipo'));
     $("#fec_ven").val($(this).data('fec_ven'));

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

    $.ajax({
      url: '../controles/controlMovDoc.php',
      type: 'POST',
      data: {"doc":id_doc},
      dataType:'json',
      success:function(result){
        var filas = Object.keys(result).length;
     
        for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
    

          var nuevafila= "<tr><td>" +
          result[i].fec_reg_mov + "</td><td>" +
          result[i].monto_mov + "</td><td>" +
          result[i].usu + "</td><td>" +
          result[i].obs_mov + "</td><td>" +
          result[i].est + "</td><tr>"

           $("#tabla_mov_doc").append(nuevafila);

        }
        
      }
    })





    $('#modal_consulta').modal('show');
});




//////////funcion anular doc
function anu_doc(id_doc){

              swal({
              title:'Anular Documento',
              text: 'Ingresa el motivo',
              content: "input",
              button: {
                text: "Anular",
                closeModal: false,
              },
            })
            .then(mot => {
              if (!mot) throw null;


              $.ajax({
                            url: '../controles/controlAnularDoc.php',
                            type: 'POST',
                            data: { id_doc: id_doc, mot: mot},
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
                                          swal("Anular", msg, "success");
                                          
                                          $('#div_tabla_doc').css("display","none");
                                          $('#tabla_docs tbody').empty();
                                          $('#rut_emp').prop('readonly', false);
                                          $('#val_emp').css("display","block");
                                          $('#atras_emp_consulta').css("display","none");
                                          break;
                                  }
                            },
                            error: function(){
                                    alert('Verifique los datos') 
                                    $("#main").show();     
                              }
                        });

             
            })
            .catch(err => {
              if (err) {
                swal("Oh no!", "Tu evaluación no se ha guardado", "error");
              } else {
                swal.stopLoading();
                swal.close();
              }
            });

}





//////////funcion atras consulta doc
$(document).on("click", "#atras_emp_consulta", function () {
  $('#formEmpConsulta').trigger("reset");   
  $('#modal_pago').find('input').val('');
  $('#modal_pago').modal('hide');
  $('#div_tabla_doc').css("display","none");
  $('#forma_consulta').prop('selectedIndex',0);
  $('#tabla_docs tbody').empty();
  $('#obs_pago').val('');
  $('#rut_emp').prop('readonly', false);
  $('#val_emp').css("display","block");
  $('#atras_emp_consulta').css("display","none");

  
});

/////////funcion cargar documentos empresa consulta
$(document).ready(function() {
  $("#formEmpConsulta").submit(function() { 

    $.ajax({
      url: '../controles/controlCargarEmp.php',
      type: 'POST',
      data:$("#formEmpConsulta").serialize(),
      dataType:'json',
      success:function(result){
        $('#nom_emp').val(result[0].razon_social_emp);
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
    });

    $("#tabla_docs").dataTable().fnDestroy();
      
       $.ajax({
      url: '../controles/controlCargarDocsEmpConsulta.php',
      type: 'POST',
      data:$("#formEmpConsulta").serialize(),
      dataType:'json',
      success:function(result){
        var filas = Object.keys(result).length;
     
        for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
    

          var nuevafila= "<tr><td style='display:none;'>" +
          result[i].id_doc + "</td><td>" +
          result[i].nro_doc + "</td><td>" +
          result[i].est + "</td><td>" +
          result[i].monto_afecto_doc + "</td><td>" +
          result[i].monto_exento_doc + "</td><td>" +
          result[i].monto_iva_doc + "</td><td>" +
          result[i].monto_total_doc + "</td><td>" +
          result[i].fec_emi_doc + "</td><td>" +
          result[i].fec_ven_doc + "</td><td>" +
          result[i].tipo_doc+"</td><td>"+
          result[i].obs_doc + "</td><td>"+
          '<a id="btn_modal_consulta" class="link-modal btn btn-outline-info" data-id="'+result[i].id_doc+'" data-doc="'+result[i].nro_doc+'" data-total="'+result[i].monto_total_doc+'" data-afecto="'+result[i].monto_afecto_doc+'" data-exento="'+result[i].monto_exento_doc+'" data-iva="'+result[i].monto_iva_doc+'" data-fec_ven="'+result[i].fec_ven_doc+'" data-tipo="'+result[i].tipo_doc+'" data-toggle="modal" >Ver</a></td><td>'
          if (result[i].est_doc == 1 && perfil[1] == 1) {
            nuevafila = nuevafila +'<button id="anu_doc" name="anu_doc" onclick="anu_doc('+result[i].id_doc+')" class="btn btn-outline-danger" >Anular</button></td></tr>'
          } else{
            nuevafila = nuevafila +'</td></tr>'
          }
     
          $("#tabla_docs").append(nuevafila);

        }
        $("#div_tabla_doc").css("display","block");
        $('#rut_emp').prop('readonly', true);
        $('#val_emp').css("display","none");
        $('#atras_emp_consulta').css("display","block");
        $('#tabla_docs').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      }
    });
    $('.dataTables_length').addClass('bs-select');
  },
  error: function(){
              swal("Error1", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
    });
    return false;
  });
});


//////////funcion atras ingreso pago
$(document).on("click", "#atras_emp_pago", function () {
  $('#formEmpPago').trigger("reset");   
  $('#modal_pago').find('input').val('');
  $('#modal_pago').modal('hide');
  $('#div_tabla_doc').css("display","none");
  $('#forma_pago').prop('selectedIndex',0);
  $('#tabla_docs tbody').empty();
  $('#obs_pago').val('');
  $('#rut_emp').prop('readonly', false);
  $('#val_emp').css("display","block");
  $('#atras_emp_pago').css("display","none");

  
});



//////////funcion cargar documentos empresa pago
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
          '<a id="btn_modal_pago" class="link-modal btn btn-outline-info" data-id="'+result[i].id_doc+'" data-doc="'+result[i].nro_doc+'" data-total="'+result[i].monto_total_doc+'" data-fec_ven="'+result[i].fec_ven_doc+'" data-toggle="modal" >Pagar</a></td></tr>'
     
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
                    $('#forma_pago').prop('selectedIndex',0);
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



//////////funcion cargar documento para pago Modal
$(document).on("click", "#btn_modal_pago", function () {
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
        if ($('#tipo_doc').val() == 1) {
          var iva = parseInt($('#afecto').val()) * 0.19;
          $('#iva').val(parseInt(iva));
        }else if ($('#tipo_doc').val() == 2) {
          $('#exento').val('0');
          if ($('#impbolcheck').prop('checked')) {
            var iva = parseInt($('#afecto').val()) * 0.10;
            $('#iva').val(parseInt(iva));
          }else{
            $('#iva').val('0');
          }
          
        }
        
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



//////////funcion cargar empresa ing doc
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

