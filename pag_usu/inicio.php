<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>HYR - Inicio</title>

<?php
  include("../includes/recursosExternos.php");
  include("../includes/infoLog.php");
  include("../includes/menu.php");
?>

<script  src="../js/funcionesInicio.js"></script>
</head>

<body>
<div class="container" id="main">
    <div class="row">
        <div class="col-12 text-center">
        
        <h3><i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;Resúmen General</h3>
        <hr>
        </div>
        
        <div class="col-12 ">
        
        <h5>Documentos de Pago Vencidos <i class="fa fa-clock-o" aria-hidden="true"></i></i></h5>
    <div class="table-responsive">
    <table id="doc_ven" class="table table-striped table-bordered" cellspacing="0" style="font-size: 0.8rem;" width="100%">
    <thead >
      <tr>
                                        <th scope="col" style="display: none">Id_documento</th>
                                        <th scope="col">Nro Doc</th>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Afecto</th>
                                        <th scope="col">Exento</th>
                                        <th scope="col">IVA</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Fecha Emisión</th>
                                        <th scope="col">Fecha Vencimiento</th>
                                        <th scope="col">Tipo Doc</th>
                                        <th scope="col">Observación</th>
                                        <th scope="col">Monto Pagado</th>
                                        <th scope="col">Notificar</th>
                                      </tr>
    </thead>
    <tbody>

    <?php
      $re = $fun ->cargar_docs_emp(0,1);

     foreach($re as $row)
        {

        
      ?>
    
    <tr>
                  <td style="display: none"><?php echo $row['id_doc']?></td>
                  <td><?php echo "N° ".$row['nro_doc']?></td>
                  <td><?php echo $row['razon_social_emp']?></td>
                  <td><?php echo $row['est']?></td>
                  <td><?php echo "<script>var string = numeral(". $row['monto_afecto_doc'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo "<script>var string = numeral(". $row['monto_exento_doc'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo "<script>var string = numeral(". $row['monto_iva_doc'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo "<script>var string = numeral(". $row['monto_total_doc'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo date('d-m-Y', strtotime($row['fec_emi_doc'])) ?></td>
                  <td><?php echo date('d-m-Y', strtotime($row['fec_ven_doc'])) ?></td>
                  <td><?php echo $row['tipo_doc']?></td>
                  <td><?php echo $row['obs_doc']?></td>
                  <td><?php echo $row['suma']?></td>

                  <td><a style="text-decoration:none"  href="#" name="" value="">Notificar</a></td>

                
                 
                

  
      </tr>

              </tr>

<?php } ?>  

    </tbody>
    <tfoot>
      <tr>
        <th scope="col" style="display: none">Id_documento</th>
                                        <th scope="col">Nro Doc</th>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Afecto</th>
                                        <th scope="col">Exento</th>
                                        <th scope="col">IVA</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Fecha Emisión</th>
                                        <th scope="col">Fecha Vencimiento</th>
                                        <th scope="col">Tipo Doc</th>
                                        <th scope="col">Observación</th>
                                        <th scope="col">Monto Pagado</th>
                                        <th scope="col">Notificar</th>
      </tr>
    </tfoot> 
  </table>
</div>
        </div>
    </div>
    <hr>
    




</div>


</body>
</html>