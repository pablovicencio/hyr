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
        labels: ['Relación']

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
console.log(result);
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
console.log(result);
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
        labels: ['Ventas']

      });
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
});
  });
