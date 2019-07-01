function ctotalDebitos() {

    

    var C020 = parseInt(document.getElementById('C020').value);//+
    var C142 = parseInt(document.getElementById('C142').value);//+
    var C732 = parseInt(document.getElementById('C732').value);//+
    var C715 = parseInt(document.getElementById('C715').value);//+
    var C587 = parseInt(document.getElementById('C587').value);//+
    var C720 = parseInt(document.getElementById('C720').value);//+
    var C502 = parseInt(document.getElementById('C502').value);//+
    var C764 = parseInt(document.getElementById('C764').value);//+
    var C717 = parseInt(document.getElementById('C717').value);//+
    var C111 = parseInt(document.getElementById('C111').value);//+
    var C759 = parseInt(document.getElementById('C759').value);//+
    var C513 = parseInt(document.getElementById('C513').value);//+
    var C510 = parseInt(document.getElementById('C510').value);//-
    var C709 = parseInt(document.getElementById('C709').value);//-
    var C734 = parseInt(document.getElementById('C734').value);//-
    var C517 = parseInt(document.getElementById('C517').value);//+
    var C501 = parseInt(document.getElementById('C501').value);//+
    var C154 = parseInt(document.getElementById('C154').value);//+
    var C518 = parseInt(document.getElementById('C518').value);//+
    var C713 = parseInt(document.getElementById('C713').value);
    var C738 = parseInt(document.getElementById('C738').value);
    var C739 = parseInt(document.getElementById('C739').value);
    var C740 = parseInt(document.getElementById('C740').value);
    var C741 = parseInt(document.getElementById('C741').value);
    //var C538 = document.getElementById('C538');

    var calc = C020+C142+C732+C715+C587+C720+C502+C764+C717+C111+C759+C513-C510-C709-C734+C517+C501+C154+C518+C713+C738+C739+C740+C741;
    
    document.getElementById("C538").value = calc;
    ctotalCreditos();
  }

  


  function ctotalCreditos() {

    
    var C538 = parseInt(document.getElementById('C538').value);
    var C511 = parseInt(document.getElementById('C511').value);
    var C514 = parseInt(document.getElementById('C514').value);
    var C521 = parseInt(document.getElementById('C521').value);
    var C560 = parseInt(document.getElementById('C560').value);
    var C562 = parseInt(document.getElementById('C562').value);
    var C520 = parseInt(document.getElementById('C520').value);
    var C762 = parseInt(document.getElementById('C762').value);
    var C766 = parseInt(document.getElementById('C766').value);
    var C525 = parseInt(document.getElementById('C525').value);
    var C528 = parseInt(document.getElementById('C528').value);//-
    var C532 = parseInt(document.getElementById('C532').value);
    var C535 = parseInt(document.getElementById('C535').value);
    var C553 = parseInt(document.getElementById('C553').value);
    var C504 = parseInt(document.getElementById('C504').value);
    var C593 = parseInt(document.getElementById('C593').value);//-
    var C594 = parseInt(document.getElementById('C594').value);//-
    var C592 = parseInt(document.getElementById('C592').value);//-
    var C539 = parseInt(document.getElementById('C539').value);//-
    var C718 = parseInt(document.getElementById('C718').value);//-
    var C164 = parseInt(document.getElementById('C164').value);

    var C730 = parseInt(document.getElementById('C730').value);
    var C729 = parseInt(document.getElementById('C729').value);
    var C742 = parseInt(document.getElementById('C742').value);
    var C743 = parseInt(document.getElementById('C743').value);
    var C744 = parseInt(document.getElementById('C744').value);
    var C745 = parseInt(document.getElementById('C745').value);

    var C127 = parseInt(document.getElementById('C127').value);
    var C544 = parseInt(document.getElementById('C544').value);
    var C523 = parseInt(document.getElementById('C523').value);
    var C712 = parseInt(document.getElementById('C712').value);
    var C757 = parseInt(document.getElementById('C757').value);
        
    

    var calculo = C511+C514+C521+C560+C562+C520+C762+C766+C525-C528+C532+C535+C553+C504-C593-C594-C592-C539-C718+C164+C127+C544+C523+C712+C757+C730+C729+C742+C743+C744+C745;
    
    document.getElementById("C537").value = calculo;
    var diferencia = C538-calculo;
    alert(diferencia);

    if (diferencia >= 0) {
      document.getElementById("C89").value = diferencia;
      document.getElementById("C77").value = 0;
    }else{
      document.getElementById("C77").value = diferencia;
      document.getElementById("C89").value = 0;
    }

  }
  
  function imptoRenta(){

    


  }


