

//RELLENO DE DATOS DEL DOCUMENTO
function mod(id_form) {
    
  $.ajax({
   url: '../controles/controlCargarDatosForm.php', 
   type: 'POST',
   data: {"id_f29":id_form},
   dataType:'json',
   success:function(result)
   {
     console.log(result);


      $('#emp').val(result[0].id_emp);
      $('#C585').val(result[0].c585); 
      $('#C20').val(result[0].c20 ); 
      $('#C586').val(result[0].c586); 
      $('#C142').val(result[0].c142); 
      $('#C731').val(result[0].c731); 
      $('#C732').val(result[0].c732); 
      $('#C714').val(result[0].c714); 
      $('#C715').val(result[0].c715); 
      $('#C515').val(result[0].c515); 
      $('#C587').val(result[0].c587); 
      $('#C720').val(result[0].c720); 
      $('#C503').val(result[0].c503); 
      $('#C502').val(result[0].c502); 
      $('#C763').val(result[0].c763); 
      $('#C764').val(result[0].c764); 
      $('#C716').val(result[0].c716); 
      $('#C717').val(result[0].c717); 
      $('#C110').val(result[0].c110); 
      $('#C111').val(result[0].c111); 
      $('#C758').val(result[0].c758); 
      $('#C759').val(result[0].c759); 
      $('#C512').val(result[0].c512); 
      $('#C513').val(result[0].c513); 
      $('#C509').val(result[0].c509); 
      $('#C510').val(result[0].c510); 
      $('#C708').val(result[0].c708); 
      $('#C709').val(result[0].c709); 
      $('#C733').val(result[0].c733); 
      $('#C734').val(result[0].c734); 
      $('#C516').val(result[0].c516); 
      $('#C517').val(result[0].c517); 
      $('#C500').val(result[0].c500); 
      $('#C501').val(result[0].c501); 
      $('#C154').val(result[0].c154); 
      $('#C518').val(result[0].c518); 
      $('#C713').val(result[0].c713); 
      $('#C738').val(result[0].c738); 
      $('#C739').val(result[0].c739); 
      $('#C740').val(result[0].c740); 
      $('#C741').val(result[0].c741); 
      $('#C538').val(result[0].c538); 
      $('#C511').val(result[0].c511); 
      $('#C514').val(result[0].c514); 
      $('#C564').val(result[0].c564); 
      $('#C521').val(result[0].c521); 
      $('#C566').val(result[0].c566); 
      $('#C560').val(result[0].c560); 
      $('#C584').val(result[0].c584); 
      $('#C562').val(result[0].c562); 
      $('#C519').val(result[0].c519); 
      $('#C520').val(result[0].c520); 
      $('#C761').val(result[0].c761); 
      $('#C762').val(result[0].c762); 
      $('#C765').val(result[0].c765); 
      $('#C766').val(result[0].c766); 
      $('#C524').val(result[0].c524); 
      $('#C525').val(result[0].c525); 
      $('#C527').val(result[0].c527); 
      $('#C528').val(result[0].c528); 
      $('#C531').val(result[0].c531); 
      $('#C532').val(result[0].c532); 
      $('#C534').val(result[0].c534); 
      $('#C535').val(result[0].c535); 
      $('#C536').val(result[0].c536); 
      $('#C553').val(result[0].c553); 
      $('#C504').val(result[0].c504); 
      $('#C593').val(result[0].c593); 
      $('#C594').val(result[0].c594); 
      $('#C592').val(result[0].c592); 
      $('#C539').val(result[0].c539); 
      $('#C718').val(result[0].c718); 
      $('#C164').val(result[0].c164); 
      $('#C730').val(result[0].c730); 
      $('#C742').val(result[0].c742); 
      $('#C743').val(result[0].c743); 
      $('#C127').val(result[0].c127); 
      $('#C729').val(result[0].c729); 
      $('#C744').val(result[0].c744); 
      $('#C745').val(result[0].c745); 
      $('#C544').val(result[0].c544); 
      $('#C523').val(result[0].c523); 
      $('#C712').val(result[0].c712); 
      $('#C757').val(result[0].c757); 
      $('#C537').val(result[0].c537); 
      $('#C77').val(result[0].c77); 
      $('#C89').val(result[0].c89); 
      $('#C760').val(result[0].c760); 
      $('#C50').val(result[0].c50); 
      $('#C751').val(result[0].c751); 
      $('#C735').val(result[0].c735); 
      $('#C48').val(result[0].c48); 
      $('#C151').val(result[0].c151); 
      $('#C153').val(result[0].c153); 
      $('#C54').val(result[0].c54); 
      $('#C56').val(result[0].c56); 
      $('#C588').val(result[0].c588); 
      $('#C589').val(result[0].c589); 
      $('#C30').val(result[0].c30); 
      $('#C563').val(result[0].c563); 
      $('#C115').val(result[0].c115); 
      $('#C68').val(result[0].c68); 
      $('#C62').val(result[0].c62); 
      $('#C565').val(result[0].c565); 
      $('#C120').val(result[0].c120); 
      $('#C542').val(result[0].c542); 
      $('#C122').val(result[0].c122); 
      $('#C123').val(result[0].c123); 
      $('#C700').val(result[0].c700); 
      $('#C701').val(result[0].c701); 
      $('#C702').val(result[0].c702); 
      $('#C711').val(result[0].c711); 
      $('#C703').val(result[0].c703); 
      $('#C66').val(result[0].c66); 
      $('#C152').val(result[0].c152); 
      $('#C70').val(result[0].c70 ); 
      $('#C595').val(result[0].c595); 
      $('#C1').val(result[0].c1); 
      $('#C2').val(result[0].c2); 
      $('#C5').val(result[0].c5); 
      $('#C583').val(result[0].c583); 
      $('#C91').val(result[0].c91); 
      $('#C92').val(result[0].c92); 
      $('#C93').val(result[0].c93); 
      $('#C94').val(result[0].c94); 
      $('#C529').val(result[0].c529); 
      $('#C530').val(result[0].c530); 
      $('#C409').val(result[0].c409); 
      $('#C522').val(result[0].c522); 
      $('#C526').val(result[0].c526); 
      $('#C113').val(result[0].c113); 
      $('#C28').val(result[0].c28); 
      $('#C548').val(result[0].c548); 
      $('#C540').val(result[0].c540); 
      $('#C541').val(result[0].c541); 
      $('#C549').val(result[0].c549); 
      $('#C550').val(result[0].c550); 
      $('#C577').val(result[0].c577); 
      $('#C32').val(result[0].c32); 
      $('#C150').val(result[0].c150); 
      $('#C146').val(result[0].c146); 
      $('#C752').val(result[0].c752); 
      $('#C545').val(result[0].c545); 
      $('#C546').val(result[0].c546); 
      $('#C710').val(result[0].c710); 
      $('#C602').val(result[0].c602); 
      $('#C575').val(result[0].c575); 
      $('#C576').val(result[0].c576); 
      $('#C574').val(result[0].c574); 
      $('#C33').val(result[0].c33); 
      $('#C580').val(result[0].c580); 
      $('#C149').val(result[0].c149); 
      $('#C582').val(result[0].c582); 
      $('#C85').val(result[0].c85); 
      $('#C753').val(result[0].c753); 
      $('#C754').val(result[0].c754); 
      $('#C551').val(result[0].c551); 
      $('#C559').val(result[0].c559); 
      $('#C508').val(result[0].c508); 
      $('#C533').val(result[0].c533); 
      $('#C552').val(result[0].c552); 
      $('#C603').val(result[0].c603); 
      $('#C507').val(result[0].c507); 
      $('#C506').val(result[0].c506); 
      $('#C556').val(result[0].c556); 
      $('#C557').val(result[0].c557); 
      $('#C558').val(result[0].c558); 
      $('#C543').val(result[0].c543); 
      $('#C573').val(result[0].c573); 
      $('#C598').val(result[0].c598); 
      $('#C39').val(result[0].c39); 
      $('#C554').val(result[0].c554); 
      $('#C736').val(result[0].c736); 
      $('#C597').val(result[0].c597); 
      $('#C555').val(result[0].c555); 
      $('#C596').val(result[0].c596); 
      $('#C725').val(result[0].c725); 
      $('#C737').val(result[0].c737); 
      $('#C727').val(result[0].c727); 
      $('#C704').val(result[0].c704); 
      $('#C705').val(result[0].c705); 
      $('#C706').val(result[0].c706); 
      $('#C160').val(result[0].c160); 
      $('#C161').val(result[0].c161); 
      $('#C570').val(result[0].c570); 
      $('#C126').val(result[0].c126); 
      $('#C128').val(result[0].c128); 
      $('#C571').val(result[0].c571); 
      $('#C572').val(result[0].c572); 
      $('#C568').val(result[0].c568); 
      $('#C590').val(result[0].c590); 
      $('#C547').val(result[0].c547); 
      $('#C728').val(result[0].c728); 
      $('#C707').val(result[0].c707); 
      $('#C73').val(result[0].c73); 
      $('#C130').val(result[0].c130); 
      $('#C591').val(result[0].c591); 
      $('#C6').val(result[0].c6); 
      $('#C610').val(result[0].c610); 
      $('#C611').val(result[0].c611); 
      $('#C612').val(result[0].c612); 
      $('#C8').val(result[0].c8); 
      $('#C53 ').val(result[0].c53 ); 
      $('#C613').val(result[0].c613); 
      $('#C9').val(result[0].c9); 
      $('#C601').val(result[0].c601); 
      $('#C604').val(result[0].c604); 
      $('#C55').val(result[0].c55); 
      $('#C44').val(result[0].c44); 
      $('#C726').val(result[0].c726); 
      $('#C313').val(result[0].c313); 
      $('#C314').val(result[0].c314); 
      $('#fecha').val(result[0].fecha_form);    
      
  }
})
}


//CONTROL CREAR FORMULARIO
$(document).ready(function() {
  $("#formCrearForm").submit(function() { 

    $.ajax({
      type: "POST",
      url: '../controles/controlCrearForm.php',
      data:$("#formCrearForm").serialize(),
      success: function (result) { 
        var msg = result.trim();

        switch(msg) {
          case '1':
              swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
              break;
          case '2':
              swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
              break;
          case '3':
              swal("Seleccionar Cliente", "Recuerde Seleccionar el Cliente antes de Ingresar el Formulario", "warning");
              break;
          default:
              swal("Ingreso Exitoso", msg, "success");
            }
      },
      error: function(){
              alert('Verifique los datos');      
      }
    });
    return false;
  });
});
  
  
  
  
//INSTANCIAS DE DATATABLE

$(document).ready(function () {
  $('#dtBasicExample1').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
  $('.dataTables_length').addClass('bs-select');
});
  

//PINTAR VERDE LOS INPUT
function green(idinput,valor){

  var id = document.getElementById(idinput);
  var val = valor;
  //alert("el Valor Es:"+val);

if (val >= 1) {
  id.style.backgroundColor = "#c1e6c7";
} else {
  id.style.backgroundColor = "#ffffff";
  document.getElementById(idinput).value = "0";
}

}

//BORRAR EL CERO AL HACER SELECCION.
function modcont(id_field){
  var id = id_field;

  if (document.getElementById(id).value == 0) {
    document.getElementById(id).value = "";
  }
  

}



  
   
  function calcularHojauno(){

    var C502 = parseInt(document.getElementById('C502').value);
    //var C763 = parseInt(document.getElementById('C763').value);
    var C764 = parseInt(document.getElementById('C764').value);
    //var C716 = parseInt(document.getElementById('C716').value);
    var C717 = parseInt(document.getElementById('C717').value);
    //var C110 = parseInt(document.getElementById('C110').value);
    var C111 = parseInt(document.getElementById('C111').value);
    //var C758 = parseInt(document.getElementById('C758').value);
    var C759 = parseInt(document.getElementById('C759').value);
    //var C512 = parseInt(document.getElementById('C512').value);
    var C513 = parseInt(document.getElementById('C513').value);
    //var C509 = parseInt(document.getElementById('C509').value);
    var C510 = parseInt(document.getElementById('C510').value);
    //var C708 = parseInt(document.getElementById('C708').value);
    var C709 = parseInt(document.getElementById('C709').value);
    //var C733 = parseInt(document.getElementById('C733').value);
    var C734 = parseInt(document.getElementById('C734').value);
    //var C516 = parseInt(document.getElementById('C516').value);
    var C517 = parseInt(document.getElementById('C517').value);
    //var C500 = parseInt(document.getElementById('C500').value);
    var C501 = parseInt(document.getElementById('C501').value);
    var C154 = parseInt(document.getElementById('C154').value);
    var C518 = parseInt(document.getElementById('C518').value);
    var C713 = parseInt(document.getElementById('C713').value);
    var C738 = parseInt(document.getElementById('C738').value);
    var C739 = parseInt(document.getElementById('C739').value);
    var C740 = parseInt(document.getElementById('C740').value);
    var C741 = parseInt(document.getElementById('C741').value);
    var C538 = parseInt(document.getElementById('C538').value);
    var C511 = parseInt(document.getElementById('C511').value);
    var C514 = parseInt(document.getElementById('C514').value);
    //var C564 = parseInt(document.getElementById('C564').value);
    var C521 = parseInt(document.getElementById('C521').value);
    //var C566 = parseInt(document.getElementById('C566').value);
    var C560 = parseInt(document.getElementById('C560').value);
    //var C584 = parseInt(document.getElementById('C584').value);
    var C562 = parseInt(document.getElementById('C562').value);
    //var C519 = parseInt(document.getElementById('C519').value);
    var C520 = parseInt(document.getElementById('C520').value);
    //var C761 = parseInt(document.getElementById('C761').value);
    var C762 = parseInt(document.getElementById('C762').value);
    //var C765 = parseInt(document.getElementById('C765').value);
    var C766 = parseInt(document.getElementById('C766').value);
    //var C524 = parseInt(document.getElementById('C524').value);
    var C525 = parseInt(document.getElementById('C525').value);
    //var C527 = parseInt(document.getElementById('C527').value);
    var C528 = parseInt(document.getElementById('C528').value);
    //var C531 = parseInt(document.getElementById('C531').value);
    var C532 = parseInt(document.getElementById('C532').value);
    //var C534 = parseInt(document.getElementById('C534').value);
    var C535 = parseInt(document.getElementById('C535').value);
    //var C536 = parseInt(document.getElementById('C536').value);
    var C553 = parseInt(document.getElementById('C553').value);
    var C504 = parseInt(document.getElementById('C504').value);
    var C593 = parseInt(document.getElementById('C593').value);
    var C594 = parseInt(document.getElementById('C594').value);
    var C592 = parseInt(document.getElementById('C592').value);
    var C539 = parseInt(document.getElementById('C539').value);
    var C718 = parseInt(document.getElementById('C718').value);
    var C164 = parseInt(document.getElementById('C164').value);
    var C730 = parseInt(document.getElementById('C730').value);
    var C742 = parseInt(document.getElementById('C742').value);
    var C743 = parseInt(document.getElementById('C743').value);
    var C127 = parseInt(document.getElementById('C127').value);
    var C729 = parseInt(document.getElementById('C729').value);
    var C744 = parseInt(document.getElementById('C744').value);
    var C745 = parseInt(document.getElementById('C745').value);
    var C544 = parseInt(document.getElementById('C544').value);
    var C523 = parseInt(document.getElementById('C523').value);
    var C712 = parseInt(document.getElementById('C712').value);
    var C757 = parseInt(document.getElementById('C757').value);
    var C537 = parseInt(document.getElementById('C537').value);
    var C77 = parseInt(document.getElementById('C77').value);
    var C89 = parseInt(document.getElementById('C89').value);
    var C760 = parseInt(document.getElementById('C760').value);
    var C50 = parseInt(document.getElementById('C50').value);
    var C751 = parseInt(document.getElementById('C751').value);
    var C735 = parseInt(document.getElementById('C735').value);
    var C48 = parseInt(document.getElementById('C48').value);
    var C151 = parseInt(document.getElementById('C151').value);
    var C153 = parseInt(document.getElementById('C153').value);
    var C54 = parseInt(document.getElementById('C54').value);
    var C56 = parseInt(document.getElementById('C56').value);
    var C588 = parseInt(document.getElementById('C588').value);
    var C589 = parseInt(document.getElementById('C589').value);
    var C30 = parseInt(document.getElementById('C30').value);
    var C563 = parseInt(document.getElementById('C563').value);
    var C115 = parseInt(document.getElementById('C115').value);
    var C68 = parseInt(document.getElementById('C68').value);
    var C62 = parseInt(document.getElementById('C62').value);
    var C565 = parseInt(document.getElementById('C565').value);
    var C120 = parseInt(document.getElementById('C120').value);
    var C542 = parseInt(document.getElementById('C542').value);
    var C122 = parseInt(document.getElementById('C122').value);
    var C123 = parseInt(document.getElementById('C123').value);
    var C700 = parseInt(document.getElementById('C700').value);
    var C701 = parseInt(document.getElementById('C701').value);
    var C702 = parseInt(document.getElementById('C702').value);
    var C711 = parseInt(document.getElementById('C711').value);
    var C703 = parseInt(document.getElementById('C703').value);
    var C66 = parseInt(document.getElementById('C66').value);
    var C152 = parseInt(document.getElementById('C152').value);
    var C70 = parseInt(document.getElementById('C70').value);
    var C595 = parseInt(document.getElementById('C595').value);
    //var C1 = (document.getElementById('C1').value);
    //var C2 = (document.getElementById('C2').value);
    //var C5 = (document.getElementById('C5').value);
    //var C583 = (document.getElementById('C583').value);
    var C91 = parseInt(document.getElementById('C91').value);
    var C92 = parseInt(document.getElementById('C92').value);
    var C93 = parseInt(document.getElementById('C93').value);
    var C94 = parseInt(document.getElementById('C94').value);



      
    var totaldebito = C502+C764+C717+C111+C759+C513-C510-C709-C734+C517+C501+C154+C518+C713+C741;
    
    document.getElementById("C538").value = totaldebito;
    
    
    
    var totalcredito = C520+C762+C766+C525-C528+C532+C535+C553+C504-C593-C594-C592-C539-C718+C164+C127+C544-C523-C712-C757;
    document.getElementById("C537").value = totalcredito;
     
    var diferencia = totaldebito-totalcredito;
    if (diferencia >= 0) {
      
      document.getElementById("C89").value = diferencia;
      document.getElementById("C77").value = 0;
    }else{
      diferencia = ( diferencia * -1);
      document.getElementById("C77").value = diferencia;
      document.getElementById("C89").value = 0;
    }
    
    //////////////////////////////
    // CALCULO LINEAS 58 - 59 60 //
    //////////////////////////////
    var baseimponible = document.getElementById("C563").value;
    var tasa = document.getElementById("C115").value;
    var ppmdet = ((baseimponible*tasa) / 100);
    document.getElementById("C62").value = Math.round(ppmdet);
   
    var baseimponible2 = document.getElementById("C120").value;
    var tasa2 = document.getElementById("C542").value;
    var ppmdet2 = ((baseimponible2*tasa2) / 100);
    document.getElementById("C123").value = Math.round(ppmdet2);

    var baseimponible3 = document.getElementById("C701").value;
    var tasa3 = document.getElementById("C702").value;
    var ppmdet3 = ((baseimponible3*tasa3) / 100);
    document.getElementById("C703").value = Math.round(ppmdet3);
    // FIN CALCULO LINEAS   58 - 59 - 60


    var subtotal = C89+C760+C50+C48+C151+C153+C54+C56+C588+C589+C62+C123+C703+C66+C152+C70;
    var total = subtotal + C92 + C93;
    //document.getElementById("C94").value = total;
    
    totaldethoja2 = document.getElementById("C598").value;
    document.getElementById("C595").value = subtotal;
    document.getElementById("C91").value = subtotal-totaldethoja2;

     
     //FIN HOJA UNO
    


      var C529 = parseInt(document.getElementById('C529').value);
      var C530 = parseInt(document.getElementById('C530').value);
      var C409 = parseInt(document.getElementById('C409').value);
      var C522 = parseInt(document.getElementById('C522').value);
      var C526 = parseInt(document.getElementById('C526').value);
      var C113 = parseInt(document.getElementById('C113').value);
      var C28 = parseInt(document.getElementById('C28').value);
      var C548 = parseInt(document.getElementById('C548').value);
      var C540 = parseInt(document.getElementById('C540').value);
      var C541 = parseInt(document.getElementById('C541').value);
      var C549 = parseInt(document.getElementById('C549').value);
      var C550 = parseInt(document.getElementById('C550').value);
      var C577 = parseInt(document.getElementById('C577').value);
      var C32 = parseInt(document.getElementById('C32').value);
      var C150 = parseInt(document.getElementById('C150').value);
      var C146 = parseInt(document.getElementById('C146').value);
      var C752 = parseInt(document.getElementById('C752').value);
      var C545 = parseInt(document.getElementById('C545').value);
      var C546 = parseInt(document.getElementById('C546').value);
      var C710 = parseInt(document.getElementById('C710').value);
      var C602 = parseInt(document.getElementById('C602').value);
      var C575 = parseInt(document.getElementById('C575').value);
      var C576 = parseInt(document.getElementById('C576').value);
      var C574 = parseInt(document.getElementById('C574').value);
      var C33 = parseInt(document.getElementById('C33').value);
      var C580 = parseInt(document.getElementById('C580').value);
      var C149 = parseInt(document.getElementById('C149').value);
      var C582 = parseInt(document.getElementById('C582').value);
      var C85 = parseInt(document.getElementById('C85').value);
      var C753 = parseInt(document.getElementById('C753').value);
      var C754 = parseInt(document.getElementById('C754').value);
      var C551 = parseInt(document.getElementById('C551').value);
      var C559 = parseInt(document.getElementById('C559').value);
      var C508 = parseInt(document.getElementById('C508').value);
      var C533 = parseInt(document.getElementById('C533').value);
      var C552 = parseInt(document.getElementById('C552').value);
      var C603 = parseInt(document.getElementById('C603').value);
      var C507 = parseInt(document.getElementById('C507').value);
      var C506 = parseInt(document.getElementById('C506').value);
      var C556 = parseInt(document.getElementById('C556').value);
      var C557 = parseInt(document.getElementById('C557').value);
      var C558 = parseInt(document.getElementById('C558').value);
      var C543 = parseInt(document.getElementById('C543').value);
      var C573 = parseInt(document.getElementById('C573').value);
      var C598 = parseInt(document.getElementById('C598').value);
      var C39 = parseInt(document.getElementById('C39').value);
      var C554 = parseInt(document.getElementById('C554').value);
      var C736 = parseInt(document.getElementById('C736').value);
      var C597 = parseInt(document.getElementById('C597').value);
      var C555 = parseInt(document.getElementById('C555').value);
      var C596 = parseInt(document.getElementById('C596').value);
      var C725 = parseInt(document.getElementById('C725').value);
      var C737 = parseInt(document.getElementById('C737').value);
      var C727 = parseInt(document.getElementById('C727').value);
      var C704 = parseInt(document.getElementById('C704').value);
      var C705 = parseInt(document.getElementById('C705').value);
      var C706 = parseInt(document.getElementById('C706').value);
      var C160 = parseInt(document.getElementById('C160').value);
      var C161 = parseInt(document.getElementById('C161').value);
      var C570 = parseInt(document.getElementById('C570').value);
      var C126 = parseInt(document.getElementById('C126').value);
      var C128 = parseInt(document.getElementById('C128').value);
      var C571 = parseInt(document.getElementById('C571').value);
      var C572 = parseInt(document.getElementById('C572').value);
      var C568 = parseInt(document.getElementById('C568').value);
      var C590 = parseInt(document.getElementById('C590').value);
      var C547 = parseInt(document.getElementById('C547').value);
      var C728 = parseInt(document.getElementById('C728').value);
      var C707 = parseInt(document.getElementById('C707').value);
      var C73 = parseInt(document.getElementById('C73').value);
      var C130 = parseInt(document.getElementById('C130').value);
      var C591 = parseInt(document.getElementById('C591').value);


      var impart37 = C113 - C28 - C548 - C540 + C541;

      if (impart37 >= 0) {
      
        document.getElementById("C550").value = impart37;
        document.getElementById("C549").value = 0;
      }else{
        impart37 = ( impart37 * -1);
        document.getElementById("C549").value = impart37;
        document.getElementById("C550").value = 0;
      }

      var debitos = C577+C32+C150+C146+C752+C545-C546-C710;
      document.getElementById("C602").value = debitos;
      
      var creditos = C576 + C33 + C149 + C85 + C754 + C551 - C559 + C508 - C533 + C552;
      document.getElementById("C603").value = creditos;

      var diferencia1 = debitos - creditos;


      if (diferencia1 >= 0) {
      
        document.getElementById("C506").value = diferencia1;
        document.getElementById("C507").value = 0;
      }else{
        diferencia1 = ( diferencia1 * -1);
        document.getElementById("C507").value = diferencia1;
        document.getElementById("C506").value = 0;
      }

      /////////////////////////////////
      // CALCULO LINEAS 98 hasta 102 //
      /////////////////////////////////

      var cod556 = document.getElementById("C556").value;

      if (cod556 >= 1) {
        var anticipo = C556 + C557 - C558;
        var calculorem = document.getElementById("C89").value;  /* $ 1.990.080 */
        document.getElementById("C543").value = anticipo;  /* $ 2.042.047 */
        document.getElementById("C573").value = anticipo-calculorem;
        document.getElementById("C598").value = calculorem; 
      } else {
        
      }

      
      


     

      //////////////////////////////
      //     CALCULO LINEA 547    //
      //////////////////////////////

      var linea65 = document.getElementById("C595").value;
      var linea102 = document.getElementById("C598").value;
      var totaldeterminado = linea65 - linea102;
      document.getElementById("C547").value = totaldeterminado;
  }



  //CONTROL MODIFICAR FORMULARIO29
$(document).ready(function() {
  $("#formModForm").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlModForm.php',
      data:$("#formModForm").serialize(),
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
                    swal("Formulario Modificado Correctamente", msg, "success");
                    
            }
      },
      error: function(){
              alert('Verifique los datos')      
        }
    });
    return false;
  });
});



