//////////funcion login
$(document).ready(function() {
          $("#formLogin").submit(function() {    
            $.ajax({
              type: "POST",
              url: '../controles/controlLogin.php',
              data:$("#formLogin").serialize(),
              success: function (result) { 
              var msg = result.trim();

                switch(msg) {
                        case '0':
                            window.location='../pag_usu/inicio.php';
                            break;
                        case '-1':
                            swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                            break;
                        case '-2':
                            swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");
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