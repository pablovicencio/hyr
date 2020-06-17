//////////funcion ingresar proyeccion de renta
$(document).ready(function() {
  $("#formVerAnuPr").submit(function() {  

            var idpr = $("#idpr").val();

            swal({
              title: "Anular Proyección de Renta",
              text: "¿Esta seguro que desea Anular esta proyección de renta?",
              icon: "warning",
              dangerMode: true,
              icon: "warning",
              buttons: [
                'Cancelar',
                'Anular'
              ],
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                type: "POST",
                url: "../controles/controlAnularPR.php",
                data:   { "id" : idpr},
                cache: false,
                      success: function (result) { 
                        var msg = result.trim();

                        switch(msg) {
                          case '-2':
                              swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                              break;
                          case '-3':
                              setInterval('location.reload()',300);
                              break;
                          default:
                              swal("Proyección de Renta Anulada", msg, "success");
                               $('#modal_pro_renta').modal('hide');
                            }
                      },
                      error: function(){
                              alert('Verifique los datos');      
                      }

                });
                } 
            });

   return false;
  });
}); 




//////////funcion boton buscar datos pro renta
$(document).on("click", "#btn_bus_pr", function () {

    //$('#ver_per').empty();

    $('#tabla_per tbody').empty();
    $('#formVerPr').trigger("reset");

    $('#tabla_ver_per tbody').empty();
    $('#formVerAnuPr').trigger("reset");

    var id_pr = $('#ver_per').val();
    $("#idpr").val(id_pr);


      $.ajax({
          url: '../controles/controlDetPr.php',
          type: 'POST',
          data: {"id":id_pr},
          dataType:'json',
          success:function(result){

                  $('#per_pr_ver').val(result[0].per);
                  $('#util_ejer_ver').val(Number(parseInt(result[0].util_ejer_pr)).toLocaleString());
                  $('#ppmo_ver').val(Number(parseInt(result[0].ppmo_pr)).toLocaleString());
                  $('#ppmv_ver').val(Number(parseInt(result[0].ppmv_pr)).toLocaleString());
                  $('#pr_ver').val(Number(parseInt(result[0].proy_renta)).toLocaleString());




                  if (result[0].reg_trib_pr == 1 || result[0].reg_trib_pr == 7 || result[0].reg_trib_pr == 2) {
                        
                        $('#base_idpc_ver').val(0);
                        $('#val_base_idpc_ver').text(0);
                   }else{
                        $('#base_idpc_ver').val(result[0].base_idpc_pr);

                        base_idpc = parseInt(result[0].base_idpc_pr) / 100;

                        val_base = Number(parseInt(result[0].util_ejer_pr) * base_idpc);

                        $('#val_base_idpc_ver').text(Number(val_base).toLocaleString());
                   }

                    $('#idpc_ver').val(result[0].idpc_pr);

                   idpc = parseInt(result[0].idpc_pr) / 100;

                   $('#val_idpc_ver').text(Number(parseInt(result[0].util_ejer_pr) * idpc).toLocaleString());

             
                      
          }

        })





          $.ajax({
          url: '../controles/controlDetPrPer.php',
          type: 'POST',
          data: {"id":id_pr},
          dataType:'json',
          success:function(result){

                  var filas = Object.keys(result).length;

                      

                for (  i = 0 ; i < filas; i++){

                  var nuevafila= "<tr><td>" +
                              result[i].nom_per + "</td><td>" +
                              result[i].participacion_prd + " %</td><td>" +
                              Number(parseInt(result[i].atrib_prd)).toLocaleString()+"</td><td>" +
                              Number(parseInt(result[i].cred_prd)).toLocaleString() + "</td><td>" +
                              Number(parseInt(result[i].igc_prd)).toLocaleString() + "</td><td>" +
                              Number(result[i].igc_total).toLocaleString() + "</td></tr>";
                  $("#tabla_ver_per").append(nuevafila);
                      
                }
                

        }


        })






     
    $('#det_pr').show();

    
  });






//////////funcion ingresar proyeccion de renta
$(document).ready(function() {
  $("#formRegProRenta").submit(function() {  


            var emp = $("#emp").val();
            var trib = $("#trib").val();
            var periodo = $("#per_pro_renta").val();
            var util_ejer = $("#util_ejer").val();
            var base_idpc = $("#base_idpc").val();
            var idpc = $("#idpc").val();
            var ppmo = $("#ppmo").val();
            var ppmv = $("#ppmv").val();
            var pr = $("#pr").val();
            var gc = $("#idgc").val();

        
            var TableData = new Array();



            if(trib == 2) {
                                  $('#tabla_per tr').each(function(row, tr){
                                        TableData[row]={
                                          "per" : $(tr).find('td:eq(0)').text()
                                            ,"part" : $(tr).find('td:eq(2)').text()
                                            , "atrib" : $(tr).find('td:eq(3)').find('input').val()
                                            , "cred" : $(tr).find('td:eq(4)').text()
                                            , "igc" : $(tr).find('td:eq(6)').text()
                                            , "igc_total" : $(tr).find('td:eq(7)').text()
                                            
                                        }
                                        var idgc = $(tr).find('td:eq(5)').text();

                                    }); 
                            

                       }else{
                                    $('#tabla_per tr').each(function(row, tr){
                                        TableData[row]={
                                          "per" : $(tr).find('td:eq(0)').text()
                                            ,"part" : $(tr).find('td:eq(2)').text()
                                            , "atrib" : $(tr).find('td:eq(3)').text()
                                            , "cred" : $(tr).find('td:eq(4)').text()
                                            , "idgc" : $(tr).find('td:eq(5)').text()
                                            , "igc" : $(tr).find('td:eq(6)').text()
                                            , "igc_total" : $(tr).find('td:eq(7)').text()
                                            
                                        }
                                        var idgc = $(tr).find('td:eq(5)').text();

                                    });
                            
                       }    

            TableData.shift();  // first row will be empty - so remove
            TableData = JSON.stringify(TableData);

            $('#tbConvertToJSON').val('JSON array: \n\n' + TableData.replace(/},/g, "},\n"));
            $.ajax({
                type: "POST",
                url: "../controles/controlCrearPR.php",
                data:   { "data" : TableData, "emp":emp,"trib":trib,"periodo":periodo,"util_ejer":util_ejer,"base_idpc":base_idpc,"idpc":idpc,"ppmo":ppmo,"ppmv":ppmv,"pr":pr,"gc":gc},
                cache: false,
                      success: function (result) { 
                        var msg = result.trim();

                        switch(msg) {
                          case '-1':
                              swal("Error Periodo Proyección", "La empresa ya cuenta con una Proyección para este periodo, favor anular el existente", "warning");
                              break;
                          case '1':
                              swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                              break;
                          case '2':
                              swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                              break;
                          case '3':
                              setInterval('location.reload()',300);
                              break;
                          default:
                              swal("Ingreso Exitoso", msg, "success");
                               $('#modal_pro_renta').modal('hide');
                            }
                      },
                      error: function(){
                              alert('Verifique los datos');      
                      }

            });
            
         return false;
  });
}); 










//////////funcion calcular proyeccion de renta y socios
$(document).on("click", "#btn_calc", function () {

    $('#tabla_per tbody').empty();

    var emp = $("#emp").val();
    var trib = $("#trib").val();
    var util_ejer = String($('#util_ejer').val()).replace(/\D/g, "");
    var idpc = String($('#val_idpc').text()).replace(/\D/g, "");
    var base_idpc = String($('#val_base_idpc').text()).replace(/\D/g, "");
    var gc = 0;  
    var ppmo = $("#ppmo").val();
    var ppmv = $("#ppmv").val();

    
                        var pr = parseInt(idpc) - parseInt(ppmo) - parseInt(ppmv)  



                        $('#pr').val(Number(parseInt(pr)).toLocaleString());




    if (($('#per_pro_renta').val() != '')&&($('#per_pro_renta').val() != 'NaN')){
      $.ajax({
            url: '../controles/controlDatosSocPro.php',
            type: 'POST',
            data: {"emp":emp},
            dataType:'json',
            success:function(result){

                      var filas = Object.keys(result).length;

                      
                      for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros



                        //regimenes trib 14A-14B no registran base calculo IDPC
                       if (trib == 1 || trib == 7) {
                            var atrib = parseInt(base_idpc) * (result[i].porc_part_soc / 100);
                            var cred = parseInt(idpc) * (result[i].porc_part_soc / 100);

                            $.ajax({
                                    url: '../controles/controlDatosGcPro.php',
                                    type: 'POST',
                                    data: {"atrib":atrib},
                                    dataType:'json',
                                    success:function(result){
                                       gc = result[0].gc;
                                       idgc = result[0].id_gc; 
                                       $("#idgc").val(idgc);                
                                  }
                              })

                              var igc_total = parseInt(gc) - parseInt(cred);

                              var nuevafila= "<tr><td style='display:none;'>" +
                              result[i].id_per + "</td><td>" +
                              result[i].nom_per + "</td><td>" +
                              result[i].porc_part_soc + " %</td><td>" +
                              Number(parseInt(atrib)).toLocaleString()+"</td><td>" +
                              Number(parseInt(cred)).toLocaleString() + "</td><td>" +
                              //result[i].idgc + "</td><td>" +
                              Number(parseInt(gc)).toLocaleString() + "</td><td>" +
                              Number(igc_total).toLocaleString() + "</td></tr>";
                            
                        //Régimen B o parcialmente integrado crédito 65%
                       }else if(trib == 2) {
                            var atrib = parseInt(base_idpc) * (result[i].porc_part_soc / 100);
                            var cred = parseInt(idpc) * (result[i].porc_part_soc / 100);
                            cred = cred * 0.65;

                            $.ajax({
                                    url: '../controles/controlDatosGcPro.php',
                                    type: 'POST',
                                    data: {"atrib":atrib},
                                    dataType:'json',
                                    success:function(result){
                                       gc = result[0].gc;
                                       idgc = result[0].id_gc; 
                                       $("#idgc").val(idgc);                  
                                  }
                              })

                              var igc_total = parseInt(gc) - parseInt(cred);

                              var nuevafila= "<tr><td style='display:none;'>" +
                              result[i].id_per + "</td><td>" +
                              result[i].nom_per + "</td><td>" +
                              result[i].porc_part_soc + " %</td><td>" +
                              "<input type='text' class='form-control nro' id='atrib' name='atrib' required></td><td>" +
                              Number(parseInt(cred)).toLocaleString() + "</td><td>" +
                              //result[i].idgc + "</td><td>" +
                              Number(parseInt(gc)).toLocaleString() + "</td><td>" +
                              Number(igc_total).toLocaleString() + "</td></tr>";
                            

                       }else{
                            var atrib = parseInt(util_ejer) * (result[i].porc_part_soc / 100);
                            var cred = parseInt(idpc) * (result[i].porc_part_soc / 100);

                            $.ajax({
                                    url: '../controles/controlDatosGcPro.php',
                                    type: 'POST',
                                    data: {"atrib":atrib},
                                    dataType:'json',
                                    success:function(result){
                                       gc = result[0].gc;
                                       idgc = result[0].id_gc; 
                                       $("#idgc").val(idgc);                  
                                  }
                              })

                              var igc_total = parseInt(gc) - parseInt(cred);

                              var nuevafila= "<tr><td style='display:none;'>" +
                              result[i].id_per + "</td><td>" +
                              result[i].nom_per + "</td><td>" +
                              result[i].porc_part_soc + " %</td><td>" +
                              Number(parseInt(atrib)).toLocaleString()+"</td><td>" +
                              Number(parseInt(cred)).toLocaleString() + "</td><td>" +
                              //result[i].idgc + "</td><td>" +
                              Number(parseInt(gc)).toLocaleString() + "</td><td>" +
                              Number(igc_total).toLocaleString() + "</td></tr>";
                            
                       }




                         $("#tabla_per").append(nuevafila);

                      }







              
          }
      })










    }else{
      swal("Error", "Favor ingrese el periodo", "warning");    
    }


  
});




//////////funcion separador de miles inputs number
$(document).on('keyup', '.nro', function (e) {
     element = e.target;
     value = element.value;
    n = value;
    n = String(n).replace(/\D/g, "");
    n = '' ? n : Number(n).toLocaleString();  
    element.value = n;
  });


//////////funcion cargar datos al cambiar fecha
$(document).ready(function(){
  $("#per_pro_renta").on('change', function() {

    var emp = $("#emp").val();
    var per = $(this).val();



    $.ajax({
        url: '../controles/controlDatosPro.php',
        type: 'POST',
        data: {"emp":emp, "per":per},
        dataType:'json',
        success:function(result){
          $('#ppmo').val(Number(parseInt(result[0].ppmo)).toLocaleString());
          $('#ppmv').val(Number(parseInt(result[0].ppmv)).toLocaleString());
      }
  })
});
});


function calculoTotal()
{ 

    if (($('#util_ejer').val() != '')&&($('#util_ejer').val() != 'NaN')){
      var util_ejer = String($('#util_ejer').val()).replace(/\D/g, "");
    }else{
      var util_ejer = 0;
    }

    if (($('#base_idpc').val() != '')&&($('#base_idpc').val() != 'NaN')){
      var base_idpc = $("#base_idpc").val();
      base_idpc = parseInt(base_idpc) / 100;
    }else{
      var base_idpc = 1;
    }

    val_base = Number(parseInt(util_ejer) * base_idpc);

    $("#val_base_idpc").text(Number(val_base).toLocaleString());

    if (($('#idpc').val() != '')||($('#idpc').val() != 'NaN')){
      var idpc = $("#idpc").val();
      idpc = parseInt(idpc) / 100;
    }else{
      var idpc = 1;
    }


    if (base_idpc == 1) {

      $("#val_idpc").text(Number(parseInt(util_ejer) * idpc).toLocaleString());
    }else{

      $("#val_idpc").text(Number(parseInt(val_base) * idpc).toLocaleString());
    }



    
}





//////////funcion modal proyeccion renta
$(document).on("click", "#btn_modal_pro_renta", function () {

    $('#ver_per').empty();

    $('#tabla_per tbody').empty();
    $('#formRegProRenta').trigger("reset");
    
    
    $('#tabla_ver_per tbody').empty();
    $('#formVerAnuPr').trigger("reset");
    
    $('#det_pr').hide();

    $("#val_base_idpc_ver").empty();
    $("#val_idpc_ver").empty();
    
    $("#val_base_idpc").empty();
    $("#val_idpc").empty();

     $('#base_idpc').prop('readonly', false);
     var id_emp = $(this).data('id');
     var rut_emp = $(this).data('rut');
     var emp = $(this).data('emp');
     var trib = $(this).data('reg_trib');

     $("#Remp_pro_renta").text(rut_emp);
     $("#emp_pro_renta").text(emp);
     $("#emp").val(id_emp);
     $("#trib").val(trib);

     //regimenes trib 14A-14B no registran base calculo IDPC
     if (trib == 1 || trib == 7 || trib == 2) {
          $('#base_idpc').prop('readonly', true);
     }




      $.ajax({
          url: '../controles/controlPerPr.php',
          type: 'POST',
          data: {"emp":id_emp},
          dataType:'json',
          success:function(result){

              var filas = Object.keys(result).length;

              if (filas > 0) {
                $('#btn_bus_pr').prop('disabled', false);
              }else{
                $('#btn_bus_pr').prop('disabled', true);
              }

                    for (  i = 0 ; i < filas; i++){ 
                       let $option = $('<option />', {
                          text: result[i].per,
                          value: result[i].id_pr,
                      });
                      $('#ver_per').prepend($option);
                    }

          }
        })






     
    $('#modal_pro_renta').modal('show');

    
  });



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
    $('#tabla_proy_ren').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      }
    });
    $('.dataTables_length').addClass('bs-select');
  });