<?php
include 'connecto2.php';


session_start();
// $_SESSION['usuario'] = "beto"; // Agregué comillas que faltaban
// $_SESSION['cn'] = "beto";
//$_SESSION['permisos'] = [1, 2];


if (!$_SESSION['cn']){
  header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Modifica Pliegos</title>

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
        <form class="form-inline mr-auto">
         
         
        </form>
        <ul class="navbar-nav navbar-right">
         
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><font color="#8bc584">Hola, <?php echo $_SESSION['cn']; ?></font></div></a>
            <div class="dropdown-menu dropdown-menu-right">
             
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Salir
              </a>
            </div>
          </li>
        </ul>
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
              <h1>Listado de Pliegos </h1>
              
            </div>

          <div class="section-body">
           
              <div class="row">
              <div class="col-md-12">
                <div class="card" style="margin-top: 5px">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="altapliego_adm.php">Alta de Pliego</a>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="ventadepliegos.php">Venta</a>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="provPliegos.php">Proveedores Pliegos</a>
              <?php  if(in_array(1,$_SESSION['permisos'])){ ?>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="usuarios.php">Usuarios</a>
              <?php } 
              
              if(in_array(2,$_SESSION['permisos'])){ ?>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="auditoria.php">Auditoría</a>
              <?php } ?>  
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
                                    <th>Contratación</th>
                                    <th>Número </th>
                                    <th>Año</th>
                                    <th>Objeto</th>
                                    <th>Presupuesto</th>
                                    <th>Fecha de Apertura</th>
                                    <th>Activo</th>
                                    <th>Fecha baja</th>
                                    <th  colspan="1">Acciones</th>
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


        <!--     ---------------------    Modal Modificar      -----------------------------------       -->


        <div class="modal fade" id="modif" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modificar Pliego</h5>
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
                                                <p class="card-text" style="font-size: 20px;">Vas a iniciar el proceso de Modificación para el PLIEGO que seleccionaste. <br>
                                                </p>
                                                <br>
                                                <br>
                                                <a href="#" style="margin-left: 90%;" class="btn btn-lg btn-primary acepto">Iniciar</a>
                                            </div>
                                        </div>

                                        <form method="POST" id="maltapliegos" >

                                        <input type="hidden" id="mcodigo" name="mcodigo" value="" >

                                            <div class="fin row">

                                                <div class="form-group  col-md-12">
                                                    <h6>Objeto :</h6>
                                                    <input type="text" required  id="mobjeto" name="mobjeto" class="  form-control form-group" >


                                                </div>

                                                <div class="form-group  col-md-4">

                                                    <h6>Tipo de Contratación:</h6>
                                                    <input type="hidden"  required id="mtipo_ant" name="mtipo_ant" >
                                                    <select id="mtipo" name="mtipo" class="form-control requerido" value="" >

                                                        <option value="-1">SELECCIONE UN TIPO</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Complete el campo!
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <h6>Numero de contratación:</h6>
                                                    <input type="text"  required id="mnrocontratacion" name="mnrocontratacion" class="  form-control form-group numero" >
                                                    <input type="hidden"  required id="mnrocontratacion_ant" name="mnrocontratacion_ant" class="  form-control form-group numero" >
                                                </div>

                                                <div class="col-md-4">
                                                    <h6>Año:</h6>
                                                    <input type="text"  required id="mano" name="mano" class="  form-control form-group numero" >
                                                    <input type="hidden"  required id="mano_ant" name="mano_ant" class="  form-control form-group numero" >
                                                </div>


                                                <div class=" col-md-6 ">
                                                    PRESUPUESTO:
                                                    <input type="text" name="mpresupuesto" id="mpresupuesto" value="" class="  form-control form-group">
                                                </div>
                                                <div class="form-group  col-md-6 ">
                                                    VALOR DEL PLIEGO:
                                                    <input type="text" name="mvalor10" id="mvalor10" value="" class="  form-control form-group" >
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    MOVIMIENTOS:

                                                    <div class="card-body row" id="mmovimientos">


                                                    </div>

                                                </div>

                                                <div class="form-group  col-md-6">
                                                    <h6>Apertura fecha y hora:</h6>

                                                    <input type="datetime-local" required  id="mapertura" name="mapertura" class="  form-control form-group" >



                                                </div>

                                                <div class="form-group  col-md-6">
                                                    <h6>Fecha y hora limite de compras:</h6>
                                                    <input type="datetime-local" required  id="mfechalimite" name="" class="  form-control form-group" >



                                                </div>

                                                <div class="form-group  col-md-6">
                                                  <!--  <h6>Notas Aclaratorias:</h6> -->
                                                    <input type="hidden" required  id="mnota" name="mnota" class="  form-control form-group" >



                                                </div>



                                                <div class="form-group  col-md-6" >
                                                    <h6>ARCHIVOS:</h6><br>
                                                    <div class="card-body row" id="archivoslici">


                                                    </div>

                                                </div>

                                                <div class="form-group  col-md-12">
                                                    <h6>Agregar mas Archivos:</h6>
                                                    <label class="text-dark p-6 "> <input type="file" required class="requerido form-control" id="idFiles" name="file" value="Archivo 0" ></label>
                                                </div>



                                                <div class="row">

                                                    <div class=" col-2 offset-9 ">
                                                        <input type="button" class=" btn btn-success btn-xl " id="mmodificarpliego" value="CONFIRMAR CAMBIOS">
                                                    </div>
                                                </div>






                                            </div>
                                        </form>



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












        <!--     ---------------------    Modal Segundo Llamado      -----------------------------------       -->


<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Segundo Llamado </h5>
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
                        <p class="card-text" style="font-size: 20px;">Vas a iniciar el proceso de Segundo Llamado para el PLIEGO que seleccionaste. <br>
                        </p>
                        <br>
                        <br>
                        <a href="#" style="margin-left: 90%;" class="btn btn-lg btn-primary acepto">Iniciar</a>
                      </div>
                    </div>

                    <form method="POST" id="altapliegos" >

                    <div class="fin row">

                        <div class="form-group  col-md-12">
                            <h6>Objeto :</h6>
                            <input type="text" required  id="objeto" name="objeto" class="  form-control form-group" readonly="" >


                        </div>

                       <div class="form-group  col-md-4">

                            <h6>Tipo de Contratación:</h6>
                            <select id="tipo" name="tipo" class="form-control requerido" value="" disabled="">
                                <option value="-1">SELECCIONE UN TIPO</option>
                            </select>
                            <div class="invalid-feedback">
                                Complete el campo!
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h6>Numero de contratación:</h6>
                            <input type="text"  required id="nrocontratacion" name="nrocontratacion" class="  form-control form-group numero" readonly="">

                        </div>


                        <div class="col-md-4">
                            <h6>Año:</h6>
                            <input type="text"  required id="ano" name="ano" class="  form-control form-group numero" readonly="">

                        </div>


                        <div class=" col-md-6 ">
                          PRESUPUESTO:
                           <input type="text" name="presupuesto" id="presupuesto" value="" class="  form-control form-group" readonly="">
                        </div>
                        <div class="form-group  col-md-6 ">
                         VALOR DEL PLIEGO:
                         <input type="text" name="valor10" id="valor10" value="" class="  form-control form-group" readonly="">
                        </div>
                        <div class="form-group  col-md-6">
                         MOVIMIENTOS:

                         <div class="card-body row" id="movimientos">


                          </div>

                        </div>

                        <div class="form-group  col-md-6">
                            <h6>Fecha/Hora Segundo Llamado:</h6>

                            <input type="datetime-local" required  id="apertura" name="apertura" class="  form-control form-group" >



                        </div>

                        <div class="form-group  col-md-6">
                            <h6>Fecha y hora limite de compras Segundo Llamado:</h6>
                            <input type="datetime-local" required  id="fechalimite" name="" class="  form-control form-group" >



                        </div>

                                              <div class="form-group  col-md-6">
                                                   <h6>Notas Aclaratorias:</h6> 
                                                    <input type="textarea" required  id="nota" name="nota" class="  form-control form-group" >



                                                </div>
                                                <!--


                                                                        <div class="form-group  col-md-6" >
                                                                          <h6>ARCHIVOS:</h6><br>
                                                                          <div class="card-body row" id="archivoslici">


                                                                          </div>

                                                                          </div>

                                                                        <div class="form-group  col-md-12">
                                                                            <h6>Agregar mas Archivos:</h6>
                                                                            <label class="text-dark p-6 "> <input type="file" required class="requerido form-control" id="idFiles" name="file" value="Archivo 0" ></label>
                                                                        </div>
                                                                        -->


                        <div class="row">

                            <div class=" col-2 offset-9 ">
                                <input type="button" class=" btn btn-success btn-xl " id="modifpliego" value="CONFIRMAR CAMBIOS">
                            </div>
                        </div>






                    </div>
                    </form>



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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

          $.ajax({
              type: 'POST',
              url: "get_tipopliego.php",
              success: function(result){
                  $("#tipo").append(result);
                  // $('.selectpicker').selectpicker('refresh');
              }
          });
      });

      $(document).ready(function () {

          $.ajax({
              type: 'POST',
              url: "get_tipopliego.php",
              success: function(result){
                  $("#mtipo").append(result);
                  // $('.selectpicker').selectpicker('refresh');
              }
          });
      });





      $( ".fin" ).hide();
     $(".acepto").click(function() {
      $( ".fin" ).fadeIn();
      $( ".inicio" ).hide();

    })

      // ------------- Carga de datos para la modificacion ---------------------------

      $('#modif').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal


          $('#mnrocontratacion').val(button.data('nrocontratacion'));
          $('#mnrocontratacion_ant').val(button.data('nrocontratacion'));
          $('#mano').val(button.data('ano'));
          $('#mano_ant').val(button.data('ano'));
          
          $('#mpresupuesto').val(button.data('presupuesto'));
          $('#mvalor10').val(button.data('valor10'));
          // $('#1apertura').val(button.data('1apertura'));
          //  $('#2apertura').val(button.data('2apertura'));
          $('#mobjeto').val(button.data('objeto'));
          $('#mcodigo').val(button.data('codigo'));
          $('#mtipo').val(button.data('tipo'));
          $('#mtipo_ant').val(button.data('tipo'));
          $('#mapertura').val(button.data('apertura').substr(0,10)+'T'+button.data('apertura').substr(11,10));
          $('#mfechalimite').val(button.data('fechalimite').substr(0,10)+'T'+button.data('fechalimite').substr(11,10));



          $.ajax({
              type: "POST",
              url: "archivoslici.php",
              data: { codigo: $('#mcodigo').val(),
                    },
              success: function(data){
                  //console.log(data);
                  $('#archivoslici').html(data);

              },
              error: function(data)
              {
                  alert("error");
              }
          });





          $.ajax({
              type: "POST",
              url: "movimientos.php",
              data: { nrocontratacion: $('#mnrocontratacion').val(),
                  tipo: $('#mtipo').val(),
                  ano: $('#mano').val(),
              },
              success: function(data){

                  $('#mmovimientos').html(data);

                  if($('#mmovimientos').find('div').length == 2){
                      dato =$(".colsecuronn1").html();
                      console.log(dato+"  "+$('#mmovimientos').find('div').length);
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
                      console.log(dato+"  "+$('#mmovimientos').find('div').length);
                      if ($('#mmovimientos').find('div').length == 4) {
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


        // -------------- carga de datos para el Segundo Llamado


       $('#info').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal


          $('#nrocontratacion').val(button.data('nrocontratacion'));
          $('#presupuesto').val(button.data('presupuesto'));
          $('#valor10').val(button.data('valor10'));
         // $('#1apertura').val(button.data('1apertura'));
        //  $('#2apertura').val(button.data('2apertura'));
          $('#objeto').val(button.data('objeto'));
          $('#tipo').val(button.data('tipo'));
          $('#ano').val(button.data('ano'));
          $('#apertura').val(button.data('sl').substr(0,10)+'T'+button.data('sl').substr(11,10));
          $('#fechalimite').val(button.data('apertura').substr(0,10)+'T'+button.data('apertura').substr(11,10));
          $('#nota').val(button.data('nota'));


          $.ajax({
            type: "POST",
            url: "archivoslici.php",
            data: { nrocontratacion: $('#nrocontratacion').val(),
                    tipo: $('#tipo').val(),
            },
            success: function(data){
                //console.log(data);
                $('#archivoslici').html(data);

            },
          error: function(data)
          {
            alert("error");
          }
          });


          $.ajax({
            type: "POST",
            url: "movimientos.php",
              data: { nrocontratacion: $('#nrocontratacion').val(),
                  tipo: $('#tipo').val(),
                  ano: $('#ano').val(),
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



        $(document).on("click",".borrar",function(event){
          let this_tr = $(this).closest('tr');
          let nrocontratacion = this_tr.data("id");
          let tipo = this_tr.data("tipo");
          let ano = this_tr.data("ano");
          console.log(this_tr);
          console.log(nrocontratacion);
          console.log(tipo);

           $.ajax({
             type: "POST",
             url: "borrarpliego.php",
             data: {
                 nrocontratacion:nrocontratacion,
                 tipo:tipo,
                 ano:ano
             },
             success: function(response){
             
              alert('El pliego fue inhabilitado para realizar operaciones.');
                 location.reload();
             },
             error: function(response)
             {
               alert("error");
             }
           });
        });

      $(document).on("click",".activar",function(event){
          let this_tr = $(this).closest('tr');
          let nrocontratacion = this_tr.data("id");
          let tipo = this_tr.data("tipo");
          let ano = this_tr.data("ano");
          console.log(this_tr);
          console.log(nrocontratacion);
          console.log(tipo);

          $.ajax({
              type: "POST",
              url: "activarpliego.php",
              data: {
                  nrocontratacion:nrocontratacion,
                  tipo:tipo
              },
              success: function(response){
                  alert('El pliego fue habilitado para realizar operaciones.');
                  location.reload();
              },
              error: function(response)
              {
                  alert("error");
              }
          });
      });





      // $('#borrar').on(function (event) {
          //  $.ajax({
          //    type: "POST",
          //    url: "borrarpliego.php",
          //   data: { nrocontratacion: $('#nrocontratacion').val(),
          //            tipo: $ ('#tipo').val(),},
          //    success: function(data){
          //     console.log(nrocontratacion);
          //   },
          //  error: function(data)
          //  {
          //    alert("error");
          //  }
          //  });
        // })


    $("#mailcomenzar").click(function() {
        var tipo = $("#tipo").val();
        var nroproveedor = $("#nroproveedor").val();
        var pliego = $("#nrocontratacion").val();
        var ano = $("#ano").val();
        var emailproveedor = $("#emailproveedor").val();
          $.ajax({
            type: "POST",
            url: "emailcomenzar.php",
            data: { pliego:pliego, nroproveedor:nroproveedor ,emailproveedor:emailproveedor,tipo:tipo},
            success: function(data){
                swal("¡Iniciaste el proceso de compra!", "¡Vas a recibir un email con el link de pago a la brevedad!", "success")
                setTimeout( function() {
                location.reload();
              }, 10000);
            }
          });

        /*  
        var cuit = $("#cuitmodalaprobar").val()
        $.ajax({
          type: "POST",
          url: "generaEstado.php",
          data: { cuit:cuit, texto: "APROBADO" ,comentario: "PROVEEDOR APROBADO CON NUMERO"+nroproveedor },
          success: function(response)
          {
             console.log(response);
          },
          error: function(response)
          {
          }
        });
      */    

      })

      

     // ------------------ Actualiza Modificacion -------- 

      $( "#mmodificarpliego" ).click(function() {


          var form_data = {
              apertura: $("#mapertura").val().replace("T", " "),
              fechalimite:$("#mfechalimite").val().replace("T", " "),
              nrocontratacion: $("#mnrocontratacion").val(),
              nrocontratacion_ant: $("#mnrocontratacion_ant").val(),
              tipo: $("#mtipo").val(),
              tipo_ant: $("#mtipo_ant").val(),
              ano: $("#mano").val(),
              ano_ant: $("#mano_ant").val(),
              nota: $("#mnota").val(),
              objeto: $("#mobjeto").val(),
              presupuesto: $("#mpresupuesto").val(),
              valor: $("#mvalor10").val(),


          };

          if ($("#mtipo").val() == "-1"){
              alert("El campo Tipo de Contratación es obligatorio");
              $("#mtipo").focus();

          }

          else if ($("#mnrocontratacion").val() == ""){
              alert("El campo Número de Contratación es obligatorio");
              $("#mnrocontratacion").focus();

          }
          else if ($("#mnrocontratacion").val() <=0){ 
            alert("El campo número de contratación debe ser un numero mayor que 0.");
            $("#mnrocontratacion").focus();

          }
          else if ($("#mano").val() == ""){
              alert("El campo Año es obligatorio");
              $("#mano").focus();

          }


          else if ($("#mapertura").val() == ""){
              alert("El campo Fecha de Apertura es obligatorio");
              $("#mapertura").focus();

          }

          else if ($("#mfechalimite").val() == ""){
              alert("El campo Fecha lìmite es obligatorio");
              $("#mfechalimite").focus();

          }

          else {


              $.ajax({
                  type: "POST",
                  url: "modif_pliego.php",
                  data: form_data,
                  success: function (response) {
                      console.log(response);

                     // alert('dd');

                      if (response != 1) {


                          alert('El Pliego fue modificado correctamente');

                          location.reload();

                      }
                      else {

                          alert('Error: Pliego duplicado.');

                          location.reload();
                      }

                  },
                  error: function (response) {
                      alert('¡Error al modificar el pliego!');
                  }
              });

          }


      });










      // ------------------ Actualiza Segundo Llamado -------- 

      $( "#modifpliego" ).click(function() {





          var form_data = {
              apertura: $("#apertura").val().replace("T", " "),
              fechalimite:$("#fechalimite").val().replace("T", " "),
              nrocontratacion: $("#nrocontratacion").val(),
              tipo: $("#tipo").val(),
              ano: $("#ano").val(),
              nota: $("#nota").val(),

          };


         if ($("#apertura").val() == ""){
              alert("El campo Fecha de Segundo Llamado es obligatorio");
              $("#apertura").focus();

          }
         else if ($("#fechalimite").val() == ""){
             alert("El campo Fecha lìmite es obligatorio");
             $("#fechalimite").focus();

         }
          else {


              $.ajax({
                  type: "POST",
                  url: "modif_seg_llamado.php",
                  data: form_data,
                  success: function (response) {

                      if (response == 0) {


                          alert('El Pliego fue modificado correctamente');

                          location.reload();

                      }

                  },
                  error: function (response) {
                      alert('¡Error al modificar el pliego!', '', 'error')
                  }
              });

          }






      });




$(document).ready(function () {

$('#pliegos').DataTable({
  dom: 'Bfrtip',
 
});




$.ajax({
  type: 'POST',
  url: "getmodificapliego.php",
  success: function(response){
    $('#pliegos').DataTable().destroy();
    $('#tbodypliegos').html(response);
    $('#pliegos').DataTable({
      "scrollX": true,
      //dom: 'Bfrtip',
      
    });
  }
});

$( ".bandeja" ).addClass( "menu-open" );
$( ".bandeja" ).addClass( "active" );  
$( ".consulta-entidades" ).addClass( "active" ); 


});


/*


        s_codigo = $("#s_codigo").val();

        alert(s_codigo);
        $.ajax({
          type: "POST",
          url: "getmodificapliego.php",
          data: {s_codigo:s_codigo},
          success: function(response)
          {

            if(response.length>2){
              $('#pliegos').DataTable().destroy();
              $('#tbodypliegos').html(response);
              $(".cargando").hide();
              $(".divpliegos").fadeIn("slow");
              $('#pliegos').DataTable(  {
                  "scrollX": true,
                  //  dom: 'Bfrtip',
                  "order": [[ 5, "desc" ]],
                  "aoColumns" : [
               { sWidth: '100px' },
              { sWidth: '50px' },
               { sWidth: '400px' },
               { sWidth: '50px' },
               { sWidth: '100px' },
                { sWidth: '50px' } ]

              });
            }else{swal ( "¡Sin resultados!" ,  "No existen resultados con este criterio de búsqueda ",  "error" );}

          },
          error: function(response)
          {
          }
        });



      


*/


function getFormData(id,data)
      {
          $("#"+id).find("input,select").each(function(i,v) {
              if(v.type!=="file") {
                  if(v.type==="checkbox" && v.checked===true) {
                      data.append(v.name,"on");
                  }else{
                      data.append(v.name,v.value);
                  }
              }
          });
          return data;
      }





     // ------------ carga archivo en la modificacion ------------------

      $('#idFiles').change(function () {
          var data=new FormData();

          var idFiles=document.getElementById("idFiles");

          var archivos=idFiles.files;
          for(var i=0;i<archivos.length;i++)
          {
              data.append("archive"+i,archivos[i]);
          }
          data=getFormData("maltapliegos",data);

          $.ajax({
              url:"archivosubidopliego.php",
              type:"POST",
              data:data,
              dataType:"text",
              contentType:false,
              processData:false,
              cache:false
          }).done(function(data){


              if(data==1)
              {

                    $.ajax({
                      type: "POST",
                      url: "archivoslici.php",
                      data: {  codigo: $("#mcodigo").val(),
                          
                      },
                      success: function(data){

                          $('#archivoslici').html(data);

                      },
                      error: function(data)
                      {
                          alert("error");
                      }
                  });
                  alert( 'Archivo subido con exito!');




              }else{
                  alert('Error en la carga del archivo');

              }
          });
      });


$( "#mpresupuesto" ).change(function() {
      Swal.fire({
  title: '¿El importe del presupuesto es correcto?',
  text: "$ "+$( "#mpresupuesto" ).val(),
  showDenyButton: true,
  confirmButtonText: `Si`,
  denyButtonText: `No`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    var presupuesto = $("#mpresupuesto").val().replace('.', '');
    var presupuesto = presupuesto.replace('.', '');
    var presupuesto = presupuesto.replace('.', '');
    var presupuesto = presupuesto.replace('.', '');


    console.log(presupuesto);
    var presupuesto = presupuesto.replace(',', '.');
    console.log(presupuesto);
    var presupuesto = Math.trunc(presupuesto);

    console.log(presupuesto);

    var total = presupuesto*(1/1000);

    console.log(total);

    var total = Math.trunc(total);

    console.log(total);

    $( "#mvalor10" ).val(total);
    //var presupuesto = $( "#presupuesto" ).val().replace('.', '')
    Swal.fire('Completado!', '', 'success')

    $(this).removeClass("is-invalid");
  } else if (result.isDenied) {
    $(this).addClass("is-invalid");
    $( "#mpresupuesto" ).focus();
  }
})


    });

function filtro()
{

    var tecla = event.key;
    if (['.','e'].includes(tecla))
        event.preventDefault()
}








  </script>
</body>
</html>
