<?php 
include 'conect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Compras Y Licitaciones</title>

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
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Pliegos </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"><img width="25px" height="25px" src="https://citymis.co/custom/vicentelopez/public/_img/logo.png" alt=""></a>
          </div>
          

          <!-- Tab panes -->
          
          
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <div class="tab-content" id="pills-tabContent">
          
        <div class="tab-pane fade show active" id="pills-pliegos" role="tabpanel" aria-labelledby="pills-profile-tab">
        <form method="POST" id="altapliegos" >
          <section class="section">
            <div class="section-header">
              <h1 class="">Venta de Pliegos</h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pliegos</a></div>
                <div class="breadcrumb-item">Venta</div>
              </div>
            </div>

          <div class="section-body">
              <input type="text"  hidden="" id="recibo" name="recibo" value="8005485">
              <div class="row">
              <div class="col-md-12">
                <div class="card" style="margin-top: 5px">
                  
                  <div class="card-body row" >
                    <h2 class="section-title col-md-12">Búsqueda</h2>

                      <div class="form-group  col-md-4  offset-md-1  ">
                        Tipo de Contratación:

                        <select id="tipoinf" name="tipoinf" class="form-control requerido">
                          <option value="CONCURSO DE PRECIOS">CONCURSO DE PRECIOS</option>
                          <option value="LICITACION PRIVADA">LICITACION PRIVADA</option>
                          <option value="LICITACIÓN PÚBLICA">LICITACIÓN PÚBLICA</option>
                        </select>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                      </div>

                      <div class="form-group  col-md-2   ">
                       Año:

                        <select id="anopliego" name="anopliego" class="form-control requerido">
                          <option value="ConcursoDePrecios">2020</option>
                        </select>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                      </div>
                      
                      <div class="form-group  col-md-2   ">
                       Estado:

                        <select id="estado" name="estado" class="form-control requerido">
                         <option value="PUBLICADA">PUBLICADA</option>
                         <option value="VENCIDA">VENCIDA</option>
                        </select>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                      </div>

                      <div class="form-group col-md-2 " style="margin-top: 30px;">
                        <div class=" btn btn-success btn-xl submit" id="buscar">BUSCAR</div><br>
                        
                      </div>
                      <div class="form-group col-md-10 offset-md-1 " style="margin-top: 30px;">
                        
                        <a target="_blank" href="https://www.vicentelopez.gov.ar/pliegos/pages/pliegos/pliegosNoAdjudicados.xhtml">LICITACIONES ANTERIORES AL 07 - 11 -2021</a>
                      </div>

                  </div>  

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
                                    <th>Titulo</th>
                                    <th>Presupuesto</th>
                                    <th>Fecha de Apertura</th>
                                    <th class="text-center">Iniciar</th>
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


<!-- Modal -->
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
                        <p class="card-text" style="font-size: 20px;">Vas a iniciar el proceso de compra de PLIEGOS. Para continuar tenes que estar inscripto en nuestro registro de proveedores  <b> </b>y  contar con un  <b>email </b>donde recibirás el pedido de cotizacion y el pliego.<br><br> <br>De no encontrarse inscripto dentro del registro de proveedores inicie el trámite haciendo click <a href="http://dev-hac-web03.vicentelopez.gov.ar/compras/postulante.php" target="_blank">aquí</a> <br><br><br><br><br><br>
                        Direccion General De Compras y Licitaciones<br>
                        </p>
                        <br>
                        <br>
                        <a href="#" style="margin-left: 90%;" class="btn btn-lg btn-primary acepto">Iniciar</a>
                      </div>
                    </div>
                    <div class="fin row">
                      
                        <div class=" col-md-6 ">
                          NUMERO DE PLIEGO:
                           <input type="text" name="" id="nropliego" value="" class="  form-control form-group" readonly="">
                        </div>


                        <div class=" col-md-6 ">
                          TIPO DE CONTRATACION:
                           <input  class="form-control"  readonly="" type="text" name="" id="tipocontra" value="" >
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
                          <div class="card-body row" id="archivoslici">

                      
                          </div>
                            
                          </div> 

                        <div class="form-group  col-md-6   ">
                          OBJETO:
                          <textarea class="form-control text-uppercase" id="objeto" style="width: 400px;height: 100px;" readonly="">
                            
                          </textarea>
                        </div>
                        <div class="form-group  col-md-6   accion">
                          Numero de proveedor:
                          <input  class="form-control" type="text" name="" id="nroproveedor" placeholder="Nuermo de proveedor">
                          Email:
                          <input  class="form-control" type="email" name="" id="emailproveedor" placeholder="email@xxxx.xxx">
                         
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
     
      
      <footer class="main-footer">
        <div class="footer-left">
          <span style="color: #833682">VIVAMOS  </span> <span><b>VICENTE LÓPEZ</b></span> <span><img width="25px" height="25px" src="https://citymis.co/custom/vicentelopez/public/_img/logo.png" alt=""></span>
        </div>
        <div class="footer-right">
          2020
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
    
    $("#buscar").click(function() {
        var form_data = {
          sector: $("#sectorinf").val(),
          tipo: $("#tipoinf").val(),
          ano: $("#anopliego").val(),
          estado: $("#estado").val(),
        };
        $("#indicadores").show();
        $(".cargando").show();
        $(".divcheques").hide();
        $.ajax({
          type: "POST",
          url: "getPliego.php",
          data: form_data,
          success: function(response)
          {  

            if(response.length>2){
              $('#pliegos').DataTable().destroy();
              $(".exportaexcel").fadeIn("slow");
              $('#tbodypliegos').html(response).fadeIn();
              $(".cargando").hide();
              $(".divpliegos").fadeIn("slow");
              $('#pliegos').DataTable(  { 
                "order": [[ 4, "desc" ]]
              });
            }else{swal ( "¡Sin resultados!" ,  "No existen resultados con este criterio de búsqueda ",  "error" );}
             
          },
          error: function(response)
          {
          }
        });

    });



    $( ".fin" ).hide();
     $(".acepto").click(function() {
      $( ".fin" ).fadeIn();
      $( ".inicio" ).hide();
     
    })
       $('#info').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          $('#nropliego').val(button.data('nropliego'));
          $('#presupuesto').val(button.data('presupuesto'));
          $('#valorpliego').val(button.data('valorpliego'));
          $('#1apertura').val(button.data('1apertura'));
          $('#2apertura').val(button.data('2apertura'));
          $('#objeto').val(button.data('objeto'));
          $('#tipocontra').val(button.data('tipocontra'));
          

          $.ajax({
            type: "POST",
            url: "archivoslici.php",
            data: { nropliego: $('#nropliego').val() },   
            success: function(data){
                console.log(data);
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
            data: { nropliego: $('#nropliego').val() },   
            success: function(data){

                $('#movimientos').html(data);
                dato =$(".colsecuronn1").html();
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
                  $(".colsecuronn1").append('   <span class="badge badge-danger">Finalizada</span>');
                  
                }else{
                  $(".accion").show();
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
          $.ajax({
            type: "POST",
            url: "emailcomenzar.php",
            data: { pliego:pliego, nroproveedor:nroproveedor ,emailproveedor:emailproveedor,tipocontra:tipocontra },   
            success: function(data){
                swal("¡Iniciaste el proceso de compra!", "¡Vas a recibir un email con el link de pago a la brevedad!", "success")
                setTimeout( function() { 
                location.reload(); 
              }, 10000);
            }
          });

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
      })


      $(".mercadopago").click(function() {
      var form_data = {
        recibo: $("#recibo").val(),
        };
      $.ajax({
        type: "POST",
        url: "getInforRecibo.php",
        data: form_data,
        success: function(response)
        {
          alert(response);
            console.log(response);
            var response = response.split(",");
            var tasa = "EST.SANITARIA";
            var cuenta= response["1"];
            var razon= response["1"]; 
            var recibo= response["2"];
            var fecha= response["3"];
            var valor= Math.trunc(response["4"]);
            var mail='';
            var retorno='www.vicentelopez.gov.ar';
            //console.log(tasa,cuenta,razon,recibo,fecha,valor,mail,retorno);
            //mercadopagoParam(tasa,cuenta,razon,recibo,fecha,valor,mail,retorno);
        },
        error: function(response)
        {
            
        }
      });
      
     
    })


    $(".pagomiscuentas").click(function() {
      var form_data = {
        recibo: $("#recibo").val(),
        };
      $.ajax({
        type: "POST",
        url: "getInforRecibo.php",
        data: form_data,
        success: function(response)
        {
            //console.log(response);
            var response = response.split(",");
            var tasa = "EST.SANITARIA";
            var cuenta= response["1"];
            var razon= response["1"]; 
            var recibo= response["2"];
            var fvenci= response["3"];
            var total= Math.trunc(response["4"]);
            var mail='';
            var retorno='www.vicentelopez.gov.ar';
            centralPagosParam(tasa,cuenta,razon,recibo,fvenci,total,fvenci,total,tasa,tasa,mail,retorno);
        },
        error: function(response)
        {
            
        }
      });
       
      
    })

    $(".link").click(function() {
      var form_data = {
        recibo: $("#recibo").val(),
        };
      $.ajax({
        type: "POST",
        url: "getInforRecibo.php",
        data: form_data,
        success: function(response)
        {
            //console.log(response);
            var response = response.split(",");
            var tasa = "EST.SANITARIA";
            var cuenta= response["1"];
            var razon= response["1"]; 
            var recibo= response["2"];
            var fvenci= response["3"];
            var total= Math.trunc(response["4"]);
            var mail='';
            var retorno='www.vicentelopez.gov.ar';
            linkParam(tasa, cuenta, razon, recibo, fvenci, total, fvenci, total, retorno);
        },
        error: function(response)
        {
            
        }
      });
     
      
    })

    $(".interbanking").click(function() {
      var form_data = {
        recibo: $("#recibo").val(),
        };
      $.ajax({
        type: "POST",
        url: "getInforRecibo.php",
        data: form_data,
        success: function(response)
        {
            //console.log(response);
            var response = response.split(",");
            var tasa = "EST.SANITARIA";
            var cuenta= response["1"];
            var razon= response["1"]; 
            var recibo= response["2"];
            var fecha= response["3"];
            var valor= Math.trunc(response["4"]);
            var mail='';
            var retorno='www.vicentelopez.gov.ar';

            interbankingParam(tasa,cuenta,razon,recibo,fecha,valor,mail,retorno); 
        },
        error: function(response)
        {
            
        }
      });  
      })


        $.ajax({
          type: "POST",
          url: "getPliego.php",
          //data: form_data,
          success: function(response)
          {  

            if(response.length>2){
              $('#pliegos').DataTable().destroy();
              $(".exportaexcel").fadeIn("slow");
              $('#tbodypliegos').html(response).fadeIn();
              $(".cargando").hide();
              $(".divpliegos").fadeIn("slow");
              $('#pliegos').DataTable(  { 
                "order": [[ 4, "desc" ]]
              });
            }else{swal ( "¡Sin resultados!" ,  "No existen resultados con este criterio de búsqueda ",  "error" );}
             
          },
          error: function(response)
          {
          }
        });
  
  </script>     
</body>
</html>