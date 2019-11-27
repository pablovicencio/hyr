//id de emp enviado por src
var idemp = document.getElementById("idemp").src.match(/\w+=\w+/g);
var emp = idemp[0].split("=");

$(document).ready(function () {


var graf = "rel";


  $.ajax({
     url: '../controles/controlCargarF29Graf.php', 
     type: 'POST',
     data: {"emp":emp[1], "graf":graf},
     dataType:'json',
     success:function(result)
     {
        new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'relgraf',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: result,
        // The name of the data record attribute that contains x-values.
        xkey: 'periodo',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Relación'],
        barColors: ['Green'],

      });
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
});
  });


$(document).ready(function () {


var graf = "debcred";


  $.ajax({
     url: '../controles/controlCargarF29Graf2.php', 
     type: 'POST',
     data: {"emp":emp[1], "graf":graf},
     dataType:'json',
     success:function(result)
     {

        new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'debcredgraf',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: result,
        // The name of the data record attribute that contains x-values.
        xkey: 'periodo',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value1', 'value2'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Débito','Crédito'],
        hideHover: 'auto',
        pointStrokeColors: ['white'],
        lineWidth: '6px',
        parseTime: false,
        lineColors: ['Green', 'Blue'],

      });
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
});
  });

$(document).ready(function () {


var graf = "ven";


  $.ajax({
     url: '../controles/controlCargarF29Graf.php', 
     type: 'POST',
     data: {"emp":emp[1], "graf":graf},
     dataType:'json',
     success:function(result)
     {

        new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'vengraf',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: result,
        // The name of the data record attribute that contains x-values.
        xkey: 'periodo',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Ventas'],

      });
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
});
  });

$(document).ready(function () {


var graf = "ppm";


  $.ajax({
     url: '../controles/controlCargarF29Graf.php', 
     type: 'POST',
     data: {"emp":emp[1], "graf":graf},
     dataType:'json',
     success:function(result)
     {

        new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'ppmgraf',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: result,
        // The name of the data record attribute that contains x-values.
        xkey: 'periodo',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['PPM']

      });
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
});
  });

$(document).ready(function () {


var graf = "impu";


  $.ajax({
     url: '../controles/controlCargarF29Graf.php', 
     type: 'POST',
     data: {"emp":emp[1], "graf":graf},
     dataType:'json',
     success:function(result)
     {

        new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'impugraf',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: result,
        // The name of the data record attribute that contains x-values.
        xkey: 'periodo',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Imp. Único']

      });
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
});
  });

$(document).ready(function () {


var graf = "ret";


  $.ajax({
     url: '../controles/controlCargarF29Graf.php', 
     type: 'POST',
     data: {"emp":emp[1], "graf":graf},
     dataType:'json',
     success:function(result)
     {

        new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'retgraf',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: result,
        // The name of the data record attribute that contains x-values.
        xkey: 'periodo',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Retención'],
        barColors: ['Green'],

      });
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
});
  });

$(document).ready(function () {


var graf = "impp";


  $.ajax({
     url: '../controles/controlCargarF29Graf.php', 
     type: 'POST',
     data: {"emp":emp[1], "graf":graf},
     dataType:'json',
     success:function(result)
     {

        new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'imppgraf',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: result,
        // The name of the data record attribute that contains x-values.
        xkey: 'periodo',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Imp. Pagado'],
        barColors: ['Green'],

      });
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
});
  });

$(document).ready(function () {


var graf = "recref";


  $.ajax({
     url: '../controles/controlCargarF29Graf.php', 
     type: 'POST',
     data: {"emp":emp[1], "graf":graf},
     dataType:'json',
     success:function(result)
     {

        new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'recrefgraf',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: result,
        // The name of the data record attribute that contains x-values.
        xkey: 'periodo',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Remanente'],

      });
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
});
  });



$(document).ready(function () {



  $.ajax({
     url: '../controles/controlCargarF29Tot.php', 
     type: 'POST',
     data: {"emp":emp[1]},
     dataType:'json',
     success:function(result)
     {
      $("#totdeb").text(Number(parseInt(result[0].deb)).toLocaleString());
      $("#totcred").text(Number(parseInt(result[0].cred)).toLocaleString());
      $("#totven").text(Number(parseInt(result[0].ven)).toLocaleString());
      $("#totppm").text(Number(parseInt(result[0].ppm)).toLocaleString());
      $("#totimpu").text(Number(parseInt(result[0].impu)).toLocaleString());
      $("#totret").text(Number(parseInt(result[0].ret)).toLocaleString());
      $("#totimpp").text(Number(parseInt(result[0].impp)).toLocaleString());
      $("#totcredfis").text(Number(parseInt(result[0].credfis)).toLocaleString());

  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
});
  });

