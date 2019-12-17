<div class="row" id="div_tabla_docs" name="div_tabla_docs">
                            <div class="col-12">
                              <div class="table-responsive">
                                 <table class="table table-striped table-bordered" id="tabla_docs_cli" name="tabla_docs_cli">
                                    <thead>
                                      <tr>
                                        <th scope="col" style="display: none">Id_documento</th>
                                        <th scope="col">Nro Doc</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Fecha Emisión</th>
                                        <th scope="col">Fecha Vencimiento</th>
                                        <th scope="col">Tipo Doc</th>
                                        <th scope="col">Observación</th>
                                        <th scope="col">Ver</th>
                                      </tr>
                                    </thead>
                                    <tbody>


                                      <?php
                                        $re = $fun->cargar_docs_emp($id_emp,2);

                                       foreach($re as $row)
                                          {

                                          
                                        ?>
                                      
                                      <tr>
                                                    <td style="display: none"><?php echo $row['id_doc']?></td>
                                                    <td><?php echo $row['nro_doc']?></td>
                                                    <td><?php echo $row['est']?></td>
                                                    <td><?php echo "<script>var string = numeral(". $row['monto_total_doc'].").format('000,000,000,000');document.write(string)</script>"?></td>

                                                    <td><?php echo $row['fec_emi_doc']?></td>
                                                    <td><?php echo $row['fec_ven_doc']?></td>
                                                    <td><?php echo $row['tipo_doc']?></td>
                                                    <td><?php echo $row['obs_doc']?></td>



                                                    <td><?php echo'<a id="btn_modal_consulta" class="link-modal btn btn-outline-info" data-id="'.$row['id_doc'].'" data-doc="'.$row['nro_doc'].'" data-total="'.$row['monto_total_doc'].'" data-afecto="'.$row['monto_afecto_doc'].'" data-exento="'.$row['monto_exento_doc'].'" data-iva="'.$row['monto_iva_doc'].'" data-fec_ven="'.$row['fec_ven_doc'].'" data-tipo="'.$row['tipo_doc'].'" data-toggle="modal" >Ver</a>';?></td>

                                                  
                                                   
                                                  

                                    
                                        </tr>

                                                </tr>

                                  <?php } ?>  




                                    </tbody>
                                  </table>
                              </div>
                            </div>
</div>
