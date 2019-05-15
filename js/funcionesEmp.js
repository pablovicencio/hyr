//INSTANCIAS DE DATATABLE

$(document).ready(function () {
    $('#dtBasicExample1').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      }
    });
    $('.dataTables_length').addClass('bs-select');
  });


  //CARGA DE GIF CREAR EMPRESA
  $(document).ajaxStart(function() {
    $("#formCrearEmp").hide();
    $("#loading").show();
       }).ajaxStop(function() {
    $("#loading").hide();
    $("#formCrearEmp").show();
    }); 

//CARGA DE GIF MODIFICAR EMPRESA     
    $(document).ajaxStart(function() {
        $("#formModEmp").hide();
        $("#loading").show();
           }).ajaxStop(function() {
        $("#loading").hide();
        $("#formModEmp").show();
    });  

//CONTROL CREAR Empresa
$(document).ready(function() {
  $("#formCrearEmp").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlCrearEmp.php',
      data:$("#formCrearEmp").serialize(),
      success: function (result) { 
        var msg = result.trim();

        switch(msg) {
          case '1':
              swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
              break;
          case '2':
              swal("Error Mail", "Favor ingrese un correo electronico para enviar las credenciales", "warning");
              break;
          case '3':
              swal("Rut Duplicado", "El RUT ya se encuentra en el sistema, puede encontrarse sin vigencia", "warning");
              break;
          default:
              swal("Empresa Creada!", msg, "success");
            }
      },
      error: function(){
              alert('Verifique los datos');      
      }
    });
    return false;
  });
});

  //BUSCAR EMPRESA
  function mod(emp) {
    
    $.ajax({
     url: '../controles/controlCargarDatosEmp.php',
     type: 'POST',
     data: {"emp":emp},
     dataType:'json',
     success:function(result){
       console.log(result);

        $('#rsoc').val(result[0].razon_social_emp);
        $('#mmail').val(result[0].mail_emp);
        $('#mrut').val(result[0].rut_emp);
        $('#mdirec').val(result[0].dir_emp);
        $('#mciudad').val(result[0].ciudad_emp);
        $('#mcomuna').val(result[0].comuna_emp);
        $('#mmme').val(result[0].monto_mensual_emp);
        $('#mmre').val(result[0].monto_renta_emp);
        $('#mcse').val(result[0].cons_soc_emp);
        $('#mrte').val(result[0].reg_trib_emp);
        $('#mpce').val(result[0].patente_comer_emp);
        $('#mvig').val(result[0].vig_emp);
        $('#mfia').val(result[0].fec_ini_act_emp);
        $('#mcsii').val(result[0].clave_sii_emp);
        $('#mcprev').val(result[0].clave_previred_emp);
        $('#mfre').val(result[0].fac_rea_emp);
        $('#mrae').val(result[0].rta_at_emp);
        $('#mevem').val(result[0].evaluacion_emp);
        $('#mcem').val(result[0].nom_contacto_emp);
        
    }
 })
}

//CONTROL MODIFICAR EMPRESA
$(document).ready(function() {
  $("#formModEmp").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlModEmp.php',
      data:$("#formModEmp").serialize(),
      success: function (result) { 
        var msg = result.trim();
        console.log(result);
        switch(msg) {
                case '0':
                    window.location.assign("../index.html")
                    break;
                case '1':
                    swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                    break;
                default:
                    swal("Usuario Modificado", msg, "success");
                    //location.reload(true);
            }
      },
      error: function(){
              alert('Verifique los datos')      
        }
    });
    return false;
  });
});

