<?php
include("conect.php");
session_start();
 if (!isset($_SESSION["legajo"])){
  header('location: index.php');
  }

$legajo = $_SESSION["legajo"] ;
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <title>Desinfección Desinsectación Desratización</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link href="dist/css/sweetalert.css" rel="stylesheet">
  <script src="dist/js/sweetalert.min.js"></script>

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <?php include 'header.php';?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'menu.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vehículos - Alta - Liquidación
        <small></small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <form id="alta" name="alta" action="alta.php"  method="post">
        <div class="row">
          <div class="col-md-12">

            <div class="box box-success">

              <div class="box-header with-border">
                <h3 class="box-title">Liquidación</h3>
              </div>
              
              <div class="box-body">

                <div class="row">

                  <div class="col-md-4 form-group">
                    <label>Dominio:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-car"></i>
                      </div>
                      <input type="text" maxlength="7" required="" class="form-control uppercase" id="dominio" name="dominio"  value="" >
                    </div>
                  </div>

                  <div class="col-md-4 form-group">
                    <label>Marca:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-car"></i>
                      </div>
                      <input type="text" maxlength="40" required="" disabled="" class="form-control" id="marca" name="marca"  value="" >
                    </div>
                  </div>

                  <div class="col-md-4 form-group">
                    <label>Modelo:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-car"></i>
                      </div>
                      <input type="text" maxlength="40" required="" disabled="" class="form-control" id="modelo" name="modelo" value="">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-4 form-group">
                    <label>Actividad:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-truck"></i>
                      </div>
                      <input type="text" maxlength="40" required="" disabled="" class="form-control" id="actividad" name="actividad" value="">
                    </div>
                  </div>

                  <div class="col-md-4 form-group">
                    <label>Cuenta:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-address-card"></i>
                      </div>
                      <input type="text" maxlength="8" required="" disabled="" class="form-control numerico" id="cuenta" name="cuenta"  value="" >
                    </div>
                  </div>

                  <div class="col-md-4 form-group">
                    <label>Expediente:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-address-card"></i>
                      </div>
                      <input type="text" maxlength="40" required="" disabled="" class="form-control numerico" id="expediente" name="expediente"  value="" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 form-group">
                    <label>Nombre:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-address-card"></i>
                      </div>
                      <input type="text" maxlength="40" required="" disabled="" class="form-control" id="nombre" name="nombre"  value="" >
                    </div>
                  </div>
                  <div class="col-md-4 form-group">
                    <label>Apellido:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-address-card"></i>
                      </div>
                      <input type="text" maxlength="40" required="" disabled="" class="form-control" id="apellido" name="apellido"  value="" >
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div> 
        </div>  

        <!--  AGREGAR FECHA DE DEUDA -->
        
        <div class="row deudaagenerar" style="display:none">
          <div class="col-md-10 col-md-offset-1">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Liquidación</h3>
              </div>
              <div class="box-body">
                <div class="row">
                    <section class="group">
                      <div class="col-md-5 form-group">
                        <label>Año:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <select class="form-control" id="selectano" name="selectano">
                            <option value="-1">SELECCIONE UN AÑO</option> 
                            <?php

                            for ($i=date("Y"); $i > date("Y")-10  ; $i--) { 
                               ?>
                               <option value="<?php echo $i?>"><?php echo $i?></option> 
                               <?php
                             } 
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-5 form-group">
                        <label>Mes:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <select class="form-control" id="selectmes" name="selectmes">
                            
                          </select>
                        </div>
                      </div>

                      <div class="col-md-2 form-group ">
                        <label>&nbsp;</label>
                        <div class="input-group" style="width: 100%;">
                          <button class="btn btn-success btn-md" style="width: 100%;" id="agregar" type="button" onclick="addPerson(event)">Agregar</button>
                        </div>
                      </div>
                    </section>
                  </form>
                </div>

                <div class="row ">
                  <div class="col-md-12">
                    <table id="altadeuda" class="table table-hover table-bordered table-dark">
                      <thead>
                        <tr>
                          <th>Dominio</th>
                          <th> Año - Mes </th>
                          <th class="text-center">Eliminar</th>
                        </tr>
                      </thead>
                      <tbody id="tbodyaltadeuda">
                        
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">  
               <button class="btn btn-success btn-md pull-right" disabled="" style="display: none" id="confirma" >Confirmar</button>
          </div>
        </div>

    </section>
  </div>

  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versión</b> 2.4.0
    </div>
    <strong>Dirección general de procesos y desarrollos informáticos.</strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">FLasdasdasOR</h3>
      </div>
    </div>
  </aside>

  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- ChartJS -->
<script src="bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</body>
<script>
$(function () {
      
$(document).ready(function () {
  
  $(".uppercase").keyup(function() {    
    $(this).val($(this).val().toUpperCase());
  });
  $("#selectano").change(function() {
      var form_data = {
        ano: $("#selectano option:selected" ).val(),
        dominio: $("#dominio").val(),
      };
      $.ajax({
        type: "POST",
        url: "buscaDeudaPorAno.php",
        data: form_data,
        success: function(response)
        {
            //alert(response);
            $('#selectmes').html(response).fadeIn();
        },
        error: function(response)
        {
            
        }
      });
    });
});

    //Initialize Select2 Elements
    $('.select2').select2()
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    $("#nombrebeneficiario").keyup(function () {
        var value = $(this).val();
        $("#nombrecobrador").val(value);
    });
    $("#apellidobeneficiario").keyup(function () {
        var value = $(this).val();
        $("#apellidocobrador").val(value);
    });
    $("#dnibeneficiario").keyup(function () {
        var value = $(this).val();
        $("#dnicobrador").val(value);
    });
  })
  $('input.numerico').keyup(function(event) {

    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40){
      event.preventDefault();
    }

    $(this).val(function(index, value) {
      return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".")
      ;
    });
  });
  $( ".vehiculos" ).addClass( "menu-open" );
  $( ".vehiculos" ).addClass( "active" );
  $( ".vehiculo" ).css( "display", "block" );
  $( ".vehiculosalta" ).addClass( "menu-open" );
  $( ".vehiculosalta" ).addClass( "active" );
  $( ".vehiculoalta" ).css( "display", "block" );
  $( ".insertdeuda" ).addClass( "active" );

  function addPerson(e) {
    e.preventDefault();
    encontradoResultado=false;
    const row = createRow({
      dominio:    $('#dominio').val(),
      selectano:  $('#selectano').val(),
      selectmes:  $('#selectmes').val(),
    });
    if($("#selectmes").prop("value")==0){
          swal("¡No se puede dar de alta este período!")
          encontradoResultado=true;
    }
    buscar = $("#selectano").prop("value")+"-"+$("#selectmes").prop("value")
      $("#altadeuda tr").find('td:eq(1)').each(function () {
        codigo = $(this).html();
        if(codigo==buscar){

            swal("¡Ya existe este período!","","warning")
            encontradoResultado=true;
         } 
      })
      if(!encontradoResultado){
      $('table tbody').prepend(row);
      }
    clean();
  }

  function createRow(data) {
    return (
      `<tr>` +
        `<td>${data.dominio}</td>` +
        `<td>${data.selectano}-${data.selectmes}</td>` +
        `<td class="text-center"><div><i style="color: red; cursor:pointer;" class="fa fa-trash danger borrar" aria-hidden="true"></i></div></td>` +
      `</tr>`
    );
  }
  $(document).on('click', '.borrar', function (event) {
    
    var elemento = $(this);
    swal({
      title: "¡Vas a borrar un período!",
      text: "¿Estás seguro?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Borrar",
      confirmButtonColor: "#ED3833",
      closeOnConfirm: false
    },
    function(){
      swal("¡Eliminado!", "¡Eliminaste el período!", "success");
      elemento.closest('tr').remove();
    });
  });
  
  function clean() {
    $('#selectano').focus();
  }
  $("#dominio").change(function() {
    var form_data = {
      dominio: $("#dominio").val(),
    };
    $.ajax({
      type: "POST",
      url: "getPadron.php",
      data: form_data,
      success: function(response)
      { 
        if(response.length>2){
          $(".deudaagenerar").fadeIn("slow");
          $("#confirma").fadeIn("slow");
          $("#dominio").prop("disabled", true);
          //$datos = response.split(',')
          var datos = response.split(',')
         // $datos = explode(",", response);
          $('#marca').val(datos[0]);
          $('#modelo').val(datos[1]+" "+datos[8]);
          $('#actividad').val(datos[2]);
          $('#cuenta').val(datos[3]);
          $('#expediente').val(datos[4]+" - "+datos[5]+" / "+datos[6]);
          $('#nombre').val(datos[9]);
          $('#apellido').val(datos[10]);
        }else{
        	swal ( "¡Sin resultados!" ,  "No existe el dominio "+$( "#dominio" ).val()+".", "error" );
        	$('#marca').val(null);
          $('#modelo').val(null);
          $('#actividad').val(null);
          $('#cuenta').val(null);
          $('#expediente').val(null);
          $('#nombre').val(null);
          $('#apellido').val(null);

          $(".deudaagenerar").fadeOut("slow");
          $("#confirma").fadeOut("slow");
        }
         
      },
      error: function(response)
      {
      }
    });
  });

  $("#confirma").click(function() {

    $("#altadeuda tbody tr").each(function(index) {
      var dominio, añomes;
      $(this).find("td").each(function(index2) {
        switch (index2) {
          case 0:
            dominio = $(this).text();
            break;
          case 1:
            añomes = $(this).text();
            break;
        }
      });
      var form_data = {
      legajo : <?php echo $legajo ;?>,
      dominio: dominio,
      añomes: añomes
      };
      $.ajax({
          type: "POST",
          url: "insetDeuda.php",
          data: form_data,
          success: function(response)
          { 
            var datos = response.split(',');
            
            switch (datos[0]) {
              case "1":

              swal("entra 1");
                  switch (datos[1]) {
                    case "-1":
                    swal("Error por excepción", "Comunicarse con administrador", "error");
                    break;
                    case "1":
                    swal("¡Error!","Dominio con 2 cuentas",  "error");
                    break;
                    case "2":
                    swal("¡Error!","Dominio sin cuenta",  "error");
                    break;
                    case "3":
                    swal("¡Error!","Error en tarifa",  "error");
                    break;
                    case "4":
                    swal("Error en inserción", "Comunicarse con administrador", "error");
                    break;
                    case "5":
                    swal("¡Error!","Error en vencimientos",  "error");
                    break;
                    case "6":
                    swal("¡Error!","Año y cuota existente",  "error");
                    break;
                    case "7":
                    swal("¡Error!","Usuario no pertenece al sistema",  "error");
                    break;
                    default:
                     swal(" Default");
                    break;
                  }
              break;
              case "0":
                swal({
                  title: "¡Hecho!",
                  text: "¡Deuda generada con éxito!",
                  type: "success",
                  showCancelButton: false,
                  confirmButtonClass: "btn-success",
                  confirmButtonText: "Ok",
                  closeOnConfirm: true
                },
                function(){
                  var url = "editvehiculo.php?dominio="+dominio;
                  window.location.href=url;
                });
              break;
              default:
                 swal("Default", "Error inesperados", "error");
              break;
            }
            
          },
          error: function(response)
          {
          }
      });
    });
  $('#tbodyaltadeuda').empty();
	$('#selectano').val(-1);
	$('#selectmes').val("");
  });

  $("#agregar").on('click', function(){
      $("#confirma").prop("disabled" , false);
  });
</script>

</html>
