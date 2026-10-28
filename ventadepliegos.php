<?php
include 'connecto2.php';

$desde="SELECT valor FROM config where id =  'VENTA-DIRECTA-HORA-INICIO' ";


  foreach ($db->query($desde) as $row){
      $desde = $row['VALOR'];
  }

  $hasta="SELECT valor FROM config where id =  'VENTA-DIRECTA-HORA-FIN' ";


  foreach ($db->query($hasta) as $row){
      $hasta = $row['VALOR'];
  }

  $url_vta_directa="SELECT valor FROM config where id =  'URL-VENTA-DIRECTA' ";


  foreach ($db->query($url_vta_directa) as $row){
      $url_vta_directa = $row['VALOR'];
  }
  


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Compras y Licitaciones</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="
  https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

  <!-- CSS Libraries -->
  <script type="text/javascript" src="https://pagoelectronico.vicentelopez.gov.ar/mercadopago.script/jquery.js"></script>
<script type="text/javascript" src="https://pagoelectronico.vicentelopez.gov.ar/mercadopago.script/JModal.js"></script>
<script type="text/javascript" src="https://pagoelectronico.vicentelopez.gov.ar/mercadopago.script/mercadopago.js"></script>

<script type="text/javascript" src="https://www.vicentelopez.gov.ar/interbanking/interbanking.Script/JQuery.js"></script>
<script type="text/javascript" src="https://www.vicentelopez.gov.ar/interbanking/interbanking.Script/JModal.js"></script>
<script type="text/javascript" src="https://www.vicentelopez.gov.ar/interbanking/interbanking.Script/interbanking.js"></script>

<script type="text/javascript" src="https://www.vicentelopez.gov.ar/centralpagos/CentralPagos.Script/JQuery.js"></script>
<script type="text/javascript" src="https://www.vicentelopez.gov.ar/centralpagos/CentralPagos.Script/JModal.js"></script>
<script type="text/javascript" src="https://www.vicentelopez.gov.ar/centralpagos/CentralPagos.Script/centralpagos2.js"></script>



<script type="text/javascript" src="https://www.vicentelopez.gov.ar/pagoelectronico/LinkDeudaOnLine.Script/JQuery.js"></script>
<script type="text/javascript" src="https://www.vicentelopez.gov.ar/pagoelectronico/LinkDeudaOnLine.Script/JModal.js"></script>
<script type="text/javascript" src="https://www.vicentelopez.gov.ar/pagoelectronico/LinkDeudaOnLine.Script/Link.js"></script>


  <!-- InputMask -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar" style="padding-top: 0px;">


      </nav>
      <div>
        <aside id="sidebar-wrapper">
         
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"><img width="25px" height="25px" src="https://citymis.co/custom/vicentelopez/public/_img/logo.png" alt=""></a>
          </div>


          <!-- Tab panes -->


        </aside>
      </div>

      <!-- Main Content -->
      <div>

<div class="section-header-breadcrumb">
         
        </div>



  <div id="pills-pliegos" role="tabpanel">
  <form method="POST" id="altapliegos" action="modificapliegos.php">
    <section class="section">
      <div class="section-header">
        <h1>Consulta de Pliegos</h1>
        
      </div>

    <div class="section-body">
     
        <div class="row">
        <div class="col-md-12">
          <div class="card" style="margin-top: 5px">
          <p class="card-text" style="font-size: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Para consultas de licitaciones con apertura anterior al 26/08/2022 hacer click <a href="https://www.vicentelopez.gov.ar/pliegos/pages/pliegos/pliegosNoAdjudicados.xhtml" target="_blank">aquí</a>
                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Solicitud de pliegos en días hábiles de <?php echo $desde." - ".$hasta." hs."; ?></b>                   
          </p>
        
       
          </div>
        </div>
      </div>

      <div class="row divpliegos"  >
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                  <div class="card">
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table id="pliegos" class="table table-striped table-bordered table-condensed" >
                            <thead>
                                <tr>
                                    <th>Contratacion</th>
                                    <th>Número </th>
                                    <th>Año </th>
                                    <th>Objeto</th>
                                    <th>Presupuesto</th>
                                    <th>Fecha de Apertura</th>
                                    <th colspan="1">Comprar</th>
                                    </tr>
                            </thead>
                            <tbody id="tbodypliegos">
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </section>
        </form>
          </div>
          <!-- FIN pliegos -->


        </div>

      </div>
      <!-- Button trigger modal -->


<!-- Modales -->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">INICIAR COMPRA </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
              <div class="" style="margin-top: 5px">

                <div class="card-body row" >

                    <div class="card w-100 inicio">
                      <div class="card-body">
                        <h5 class="card-title"><u>INFORMACIÓN IMPORTANTE</u></h5><br><br><br><br><br><br>
                        <p class="card-text" style="font-size: 20px;">Vas a iniciar el proceso de compra de PLIEGOS. Para continuar tenes que estar inscripto en nuestro registro de proveedores  <b> </b>y  contar con un  <b>email </b>donde recibirás el pedido de cotizacion y el pliego.<br><br> <br>De no encontrarse inscripto dentro del registro de proveedores inicie el trámite haciendo click <a href="<?php echo $url_vta_directa; ?>postulante.php" target="_blank">aquí</a> <br><br><br><br><br><br>
                        Direccion General De Compras y Licitaciones<br>
                        </p>
                        <br>
                        <br>
                        <a href="#" style="margin-left: 90%;" class="btn btn-lg btn-primary acepto">Iniciar</a>
                      </div>
                    </div>
                    <div class="fin row">

                        <div class=" col-md-4 ">
                          TIPO DE CONTRATACION:
                           <input  class="form-control"  readonly="" type="text" name="" id="txttipocontra" value="" >
                            <input  class="form-control"  readonly="" type="hidden" name="" id="tipocontra" value="" >
                            <input  class="form-control"  readonly="" type="hidden" name="" id="codigo" value="" >
                        </div>

                        <div class=" col-md-4 ">
                          NUMERO DE PLIEGO:
                           <input type="text" name="" id="nropliego" value="" class="  form-control form-group" readonly="">
                        </div>

                        <div class=" col-md-4 ">
                          AÑO:
                           <input type="text" name="" id="anopliego" value="" class="  form-control form-group" readonly="">
                        </div>

                        <div class=" col-md-6 ">
                          PRESUPUESTO:
                           <input type="text" name="" id="presupuesto" value="" class="  form-control form-group" readonly="">
                        </div>
                        <div class="form-group  col-md-6 ">
                         VALOR DEL PLIEGO:
                         <input type="text" name="" id="valorpliego" value="" class="  form-control form-group" readonly="">
                        </div>
                        <div class="form-group  col-md-6">
                         MOVIMIENTOS:

                         <div class="card-body row" id="movimientos">


                          </div>

                        </div>



                        <div class="form-group  col-md-6     ">
                          <h6>ARCHIVOS:</h6><br>
                          <div class="card-body row" id="archivosventapliego">


                          </div>

                          </div>

                        <div class="form-group  col-md-6   ">
                          OBJETO:
                          <textarea class="form-control text-uppercase" id="objeto" style="width: 400px;height: 100px;" readonly="">

                          </textarea>
                        </div>
                        <div class="form-group  col-md-6   accion">
                          Numero de proveedor:
                          <input  class="form-control"  maxlength="6" type="text" required name="" id="nroproveedor" placeholder="Número de proveedor">
                          Razón Social:
                          <input  class="form-control"  maxlength="200" type="text" required name="" id="razon" placeholder="Razon Social">
                          Cuit:
                          <input  class="form-control"  maxlength="25" type="text" required name="" id="cuit" placeholder="Número de CUIT">
                          Email:
                          <input  class="form-control"  type="email" maxlength="200" required name="" id="emailproveedor" placeholder="email@xxxx.xxx">

                        </div>
                        <br>
                        <div class="col-9 p-8 accion">
                          <p style="padding-left: 25px;"><b>Ingrese su numero de proveedor y presione comenzar para iniciar el proceso de compra </b></p>
                        </div>



                            <div class="col-3 p-8 accion">

                              <button type="button" class="btn btn-success btn-xl" id="mailcomenzar" data-dismiss="modal">Comenzar</button>
                              <button type="button" class="btn btn-danger btn-xl" data-dismiss="modal">Cerrar</button>
                            </div>
                    </div>



                </div>
              </div>
            </div>
          </div>
          <div class="row">

          </div>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="info-fuera-servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
              <div class="" style="margin-top: 5px">

                <div class="card-body row" >

                    <div class="card w-100 inicio">
                      <div class="card-body">
                        <h5 class="card-title" ><u> <font color="red">INFORMACIÓN IMPORTANTE</font></u></h5><br><br><br><br><br><br>
                        <p class="card-text" style="font-size: 20px;"><font color="red">No es posible realizar la operación, proceso fuera del horario de atención permitida.</font><br>
                        </p>
                        <br>
                        <br>
                      
                      </div>
                    </div>
                   
                </div>
              </div>
            </div>
          </div>
          <div class="row">

          </div>
      </div>

    </div>
  </div>
</div>



<footer class="main-footer">
        <div class="footer-left">
          <span style="color: #833682">VIVAMOS  </span> <span><b>VICENTE LÓPEZ</b></span> <span><img width="25px" height="25px" src="https://citymis.co/custom/vicentelopez/public/_img/logo.png" alt=""></span>
        </div>
        <div class="footer-right">
          2022
        </div>
      </footer>
    </div>
  </div>


 <!-- General JS Scripts -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->


  <script src="assets/input-mask/jquery.inputmask.js"></script>
<script src="assets/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="assets/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/index-0.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
  <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js
"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js
"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js
"></script>



  <script>
$(document).ready(function () {

$('#pliegos').DataTable({
  dom: 'Bfrtip',
 
});

$( ".bandeja" ).addClass( "menu-open" );
$( ".bandeja" ).addClass( "active" );  
$( ".consulta-entidades" ).addClass( "active" ); 


});


$.ajax({
          type: "POST",
          url: "getPliego.php",
          //data: form_data,
          success: function(response){
    $('#pliegos').DataTable().destroy();
    $('#tbodypliegos').html(response);
    $('#pliegos').DataTable({
      "scrollX": true,
      //dom: 'Bfrtip',
      "order": [[ 6, "desc" ]],
      "aoColumns" : [
               { sWidth: '10%' },
              { sWidth: '5%' },
              { sWidth: '5%' },
               { sWidth: '50%' },
               { sWidth: '10%' },
               { sWidth: '10%' },
                { sWidth: '10%' } ],
    });
  }
});






    $( ".fin" ).hide();
     $(".acepto").click(function() {
      $( ".fin" ).fadeIn();
      $( ".inicio" ).hide();

    })
       $('#info').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          $('#nropliego').val(button.data('nropliego'));
          $('#anopliego').val(button.data('anopliego'));
          $('#presupuesto').val(button.data('presupuesto'));
          $('#valorpliego').val(button.data('valorpliego'));
          $('#1apertura').val(button.data('1apertura'));
          $('#2apertura').val(button.data('2apertura'));
          $('#objeto').val(button.data('objeto'));
          $('#tipocontra').val(button.data('tipocontra'));
          $('#txttipocontra').val(button.data('txttipocontra'));
          $('#codigo').val(button.data('codigo'));
          


          $.ajax({
            type: "POST",
            url: "archivosventapliego.php",
            data: { codigo: $('#codigo').val(),
                
              },
            success: function(data){
                //console.log(data);
                $('#archivosventapliego').html(data);

            },
          error: function(data)
          {
            alert("error");
          }
          });


          $.ajax({
            type: "POST",
            url: "movimientos.php",
              data: { nrocontratacion: $('#nropliego').val(),
                  tipo: $('#tipocontra').val(),
                  ano: $('#anopliego').val()
              },
            success: function(data){

                $('#movimientos').html(data);

                if($('#movimientos').find('div').length == 2){
                  dato =$(".colsecuronn1").html();
                  console.log(dato+"  "+$('#movimientos').find('div').length);
                      var d = new Date();

                      var month = d.getMonth()+1;
                      var day = d.getDate();
                      var n = d.toLocaleTimeString();

                      var output = d.getFullYear() + '-' +
                          ((''+month).length<2 ? '0' : '') + month + '-' +
                          ((''+day).length<2 ? '0' : '') + day + ' '+ n;



                      var outputUpdated = new Date(output.replace(/-/g,'/'));
                      var datoUpdated = new Date(dato.replace(/-/g,'/'));
                      if (outputUpdated > datoUpdated) {
                        $(".accion").hide();
                        $(".colsecuronn1").append('<span class="badge badge-danger">Vencida</span>');

                      }else{
                        $(".accion").show();
                      }
                }else{
                  dato =$(".colsecuronn3").html();
                  console.log(dato+"  "+$('#movimientos').find('div').length);
                    if ($('#movimientos').find('div').length == 4) {
                      var d = new Date();

                      var month = d.getMonth()+1;
                      var day = d.getDate();
                      var n = d.toLocaleTimeString();

                      var output = d.getFullYear() + '-' +
                          ((''+month).length<2 ? '0' : '') + month + '-' +
                          ((''+day).length<2 ? '0' : '') + day + ' '+ n;



                      var outputUpdated = new Date(output.replace(/-/g,'/'));
                      var datoUpdated = new Date(dato.replace(/-/g,'/'));
                      if (outputUpdated > datoUpdated) {
                        $(".accion").hide();
                        $(".colsecuronn3").append('<span class="badge badge-danger">Finalizada</span>');

                      }else{
                        $(".accion").show();
                      }
                    }
                }



            },
          error: function(data)
          {
            alert("error");
          }
          });



          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)

          //modal.find('.modal-title').text(cuit)
        })


    $("#mailcomenzar").click(function() {
        var tipocontra = $("#tipocontra").val();
        var nroproveedor = $("#nroproveedor").val();
        var pliego = $("#nropliego").val();
        var emailproveedor = $("#emailproveedor").val();
        var razon = $("#razon").val();
        var cuit = $("#cuit").val();
        var ano = $("#anopliego").val();

        if(nroproveedor == ""){
          $("#nombrealta").focus();
          swal("El campo numero de proveedor es obligatorio","","warning");
        }
        else if(emailproveedor == ""){
          $("#apellidoalta").focus();
          swal("El campo email de proveedor es obligatorio","","warning");
        }
        else if(razon == ""){
          $("#razon").focus();
          swal("El campo Razón Social es obligatorio","","warning");
        }
        else if(cuit == ""){
          $("#cuit").focus();
          swal("El campo CUIT es obligatorio","","warning");
        }
        else {

          $.ajax({
            type: "POST",
            url: "validarProveedor.php",
            data: { nroproveedor:nroproveedor,
                    tipocontra:tipocontra,
                    pliego:pliego,
                    ano:ano},
            success: function(data){
            
                
                if (data.trim() == '3'){
                    alert("Error: No es posible realizar la operación, proceso fuera del horario de atención permitida. ");
                }
              else  if (data.trim() == '0'){
                    alert("Error: El proveedor es inválido.");
                }
                else if (data.trim() == '1'){
                    alert("Error: El proveedor es inexistente.");
                }
                else if (data.trim() == '2'){
                    alert("Error: usted ya solicito esta licitación nro " + pliego);
                }                
                else{

                    if ( confirm('Esta por iniciar el proceso de compra. ¿Está seguro?') ){


                      $.ajax({
                              type: "POST",
                              url: "emailcomenzar.php",
                              data: { pliego:pliego, 
                                      nroproveedor:nroproveedor ,
                                      emailproveedor:emailproveedor,
                                      tipocontra:tipocontra,
                                      ano:ano,
                                      razon:razon,
                                      cuit:cuit,
                                       },
                              success: function(data){
                               
                                      swal("¡Iniciaste el proceso de compra!", "¡Vas a recibir un email con el link de pago a la brevedad!", "success");
                                      setTimeout( function() {
                                          location.reload();
                                      }, 10000);

                              }
                            });


                    }
                  else {

                    alert('No se inició el proceso de compra.');
                  }  

                } 
             }     
          }  );



        }

      });
      

      

  </script>
</body>
</html>
