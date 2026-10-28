<?php
include 'connecto2.php';

session_start();

if (!isset($_SESSION['cn']) || !$_SESSION['cn']){
  header('Location: index.php');
  exit; // Siempre es buena práctica agregar exit después de un header location
}
//lee el codigo para el archivo
$sql="SELECT id_archivo
FROM codigo_archivo";

$row = $db->query($sql);

$dato = $row->fetch();

$codigo = $dato[0];

//actualiza la secuencia de codigos

$sql="
update codigo_archivo
set id_archivo = id_archivo + 1 ";

$row = $db->query($sql);



$ano = date("Y");

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
      <form class="form-inline mr-auto">


         </form>
         <ul class="navbar-nav navbar-right">

           <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
             <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
             <!-- Se aplica Output Encoding a la variable de sesión para prevenir XSS -->
             <div class="d-sm-none d-lg-inline-block"><font color="#8bc584">Hola, <?php echo htmlspecialchars($_SESSION['cn'], ENT_QUOTES, 'UTF-8'); ?></font></div></a>
             <div class="dropdown-menu dropdown-menu-right">

               <div class="dropdown-divider"></div>
               <a href="logout.php" class="dropdown-item has-icon text-danger">
                 <i class="fas fa-sign-out-alt"></i> Salir
               </a>
             </div>
           </li>
         </ul>

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
              <h1 class="">Subir un Pliegos</h1>


              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="modificapliegos.php">Listado de Pliegos</a></div>
                <div class="breadcrumb-item">Subir</div>
              </div>
            </div>
            <br>


          <div class="section-body">
              <input type="text"  hidden="" id="recibo" name="recibo" value="10802358774">
              <div class="row">
              <div class="col-md-12">
                <div class="card" style="margin-top: 5px">

            <div>
            <h3>Apretar F5 o refrescar la pagina para subir un pliego</h3>
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Subir Pliego</h4>
      </div>
    <form method="POST" id="altapostulante" >
      <!-- Se aplica htmlspecialchars para evitar XSS en el HTML -->
      <input type="hidden" id="codigo" name="codigo" value="<?php echo htmlspecialchars($codigo, ENT_QUOTES, 'UTF-8'); ?>" >
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
              <div class="card" style="margin-top: 5px">

                <div class="card-body row" >
                  <div class="form-group  col-md-12">
                       <h6>Objeto :</h6>
                       <input type="text" required  id="objeto" name="objeto" class="  form-control form-group" >


                      </div>

                  <div class="form-group  col-4">

                       <h6>Tipo de Contratación:</h6>
                       <select id="tipo" name="tipo" class="form-control requerido" value="">
                                          <option value="-1">SELECCIONE UN TIPO</option>
                       </select>
                       <div class="invalid-feedback">
                         Complete el campo!
                       </div>
                      </div>



                     <div class="form-group  col-md-4">
                       <h6>Numero de contrataci&oacute;n:</h6>
                       <input type="number"  required id="nrocontratacion" name="nrocontratacion" class="form-control form-group" step="1" onkeydown="filtro()">


                      </div>

                      <div class="form-group  col-md-4">
                       <h6>A&ntilde;o:</h6>
                       <input type="number"  required id="ano" name="ano" class="form-control form-group" step="1" value="<?php echo (int)$ano; ?>" >


                      </div>



                     <div class="form-group col-6">
                        <h6>Secretaria:</h6>
                        <select id="secretaria" required  name="secretaria" class="form-control requerido">
                          <option value="-1">Seleccione una secretaria</option>
                          <option value="Jefatura de Gabinete">Jefatura de Gabinete</option>
                          <option value="Secretaria General">Secretaria General</option>
                          <option value="Secretaria de Deportes">Secretaria de Deportes</option>
                          <option value="Secretaria de Seguridad">Secretaria de Seguridad</option>
                          <option value="Secretaría de Ingresos Públicos">Secretaría de Ingresos Públicos</option>
                          <option value="Secretaría de Recursos Humanos">Secretaría de Recursos Humanos</option>
                          <option value="Secretaría de Fiscalización y Control">Secretaría de Fiscalización y Control</option>
                          <option value="Secretaría de Hacienda y Finanzas">Secretaría de Hacienda y Finanzas</option>
                          <option value="Secretaria de Desarrollo Social">Secretaria de Desarrollo Social</option>
                          <option value="Secretaria de Comunicación">Secretaria de Comunicación</option>
                          <option value="Secretaria de Gobierno y Legal y Tecnica">Secretaria de Gobierno y Legal y Tecnica</option>
                          <option value="Secretaria de Salud">Secretaria de Salud</option>
                          <option value="Secretaria de Educacion y Empleo">Secretaria de Educacion y Empleo</option>
                          <option value="Secretaria de Cultura">Secretaria de Cultura</option>
                          <option value="Secretaria de Planeamiento y Obras Publicas">Secretaria de Planeamiento y Obras Publicas</option>
                          <option value="Secretaria de Servicios Publicos">Secretaria de Servicios Publicos</option>
                          <option value="Secretaria de Servicios Publicos">Secretaria de Transformacion Digital</option>
                        </select>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                      </div>

                       <div class="form-group  col-md-6">
                       <h6>Apertura fecha y hora:</h6>

                       <input type="datetime-local" required  id="apertura" name="apertura" class="  form-control form-group" >



                      </div>


                      <div class="form-group  col-6  ">
                        <h6>Observacion:</h6>
                        <textarea class="form-control"  id="observacion" style="width: 400px;height: 100px;" ></textarea>
                      </div>

                       <div class="form-group  col-md-6">
                       <h6>Fecha y hora limite de compras:</h6>
                       <input type="datetime-local" required  id="fechalimite" name="" class="  form-control form-group" >



                      </div>



                    <div class=" col-md-6 ">
                      <h6>Presupuesto:</h6>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" id="presupuesto" required   class="  form-control form-group numero"   >
                      </div>
                    </div>

                    <div class=" col-6">
                      <h6>Valor del Pliego:</h6>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" id="valor10" name="valor10" placeholder="VALOR DEL PLIEGO" class="form-control form-group" >
                        <div class="input-group-prepend">
                          <div class="input-group-text"></div>
                        </div>
                      </div>
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





                </div>
                <div class="row">

                  <div class=" col-4 offset-9 ">
                    <input type="button" class=" btn btn-success btn-xl " id="subirpliego" value="SUBIR PLIEGO">
                     <!-- <a class=" btn btn-success btn-xl " href="modificapliegos.php">FINALIZAR CARGA</a>  -->
                  </div>


              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>


      <footer class="main-footer">
        <div class="footer-left">
          <span style="color: #833682">VIVAMOS  </span> <span><b>VICENTE LÓPEZ</b></span> <span><img width="25px" height="25px" src="https://citymis.co/custom/vicentelopez/public/_img/logo.png" alt=""></span>
        </div>
        <div class="footer-right">
          <?php echo (int)$ano; ?>
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
/*
    $('#nrocontratacion').change(function () {


      var nrocontratacion = $("#nrocontratacion").val();

      var tipo = $("#tipo").val();

      $.ajax({
        type: "POST",
        url: "nrocontratacion.php",
        data: {nrocontratacion,
               tipo},
        success: function(response)
        {
            //alert(response);

          if (parseInt(response) === 1) {
            Swal.fire('¡Error!', 'Ya existe esa contratacion', 'error');
            //location.reload();
          }

        },
        error: function(response)
        {
            Swal.fire('¡Error!', 'Al determinar el nro de contratacion', 'error')
        }
      });

    });
*/

$('#idFiles').change(function () {
    var data=new FormData();

    var idFiles=document.getElementById("idFiles");

    var archivos=idFiles.files;
    for(var i=0;i<archivos.length;i++)
    {
        data.append("archive"+i,archivos[i]);
    }
    data=getFormData("altapostulante",data)
    $.ajax({
        url:"archivosubidopliego.php",
        type:"POST",
        data:data,
        dataType:"json",
        contentType:false,
        processData:false,
        cache:false
    }).done(function(data){

        if(data==1)
        {

            $.ajax({
                type: "POST",
                url: "archivoslici.php",
                // AQUÍ ESTÁ LA REMEDIACIÓN DEL PENTEST: Se usa json_encode para inyectar variables PHP en JS de forma segura
                data: {  codigo: <?php echo json_encode($codigo); ?>,
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


    $('#exampleModalCenter').modal('show')

    $( "#subirpliego" ).click(function() {



          var form = $("#altapostulante");

          var form_data = {
          usuario:'1',
          objeto: $("#objeto").val(),
          tipo: $("#tipo").val(),
          nrocontratacion: $("#nrocontratacion").val(),
          ano: $("#ano").val(),
          secretaria: $("#secretaria").val(),
          apertura: $("#apertura").val(),
          observacion: $("#observacion").val(),
          presupuesto: $("#presupuesto").val(),
          apertura: $("#apertura").val().replace("T", " "),

          fechalimite: $("#fechalimite").val().replace("T", " "),

          valor10: $("#valor10").val(),
          codigo: $("#codigo").val(),

          };

        if($("#objeto").val() == ""){
            alert("El campo objeto es obligatorio");
            $("#objeto").focus();

        }
        else if ($("#nrocontratacion").val() == ""){
            alert("El campo número de contratación es obligatorio");
            $("#nrocontratacion").focus();

        }
        else if ($("#tipo").val() == "-1"){
            alert("El campo Tipo de Contratación es obligatorio");
            $("#tipo").focus();

        }
        else if ($("#nrocontratacion").val() <=0){
            alert("El campo número de contratación debe ser un numero mayor que 0.");
            $("#nrocontratacion").focus();

        }
        else if ($("#secretaria").val() == "-1"){
            alert("El campo Secretaría es obligatorio");
            $("#secretaria").focus();

        }
        else if ($("#apertura").val() == ""){
            alert("El campo Fecha de Apertura es obligatorio");
            $("#apertura").focus();

        }
        else if ($("#fechalimite").val() == ""){
            alert("El campo Fecha lìmite es obligatorio");
            $("#fechalimite").focus();

        }
        else if ($("#presupuesto").val() == ""){
            alert("El campo Presupuesto es obligatorio");
            $("#presupuesto").focus();

        }

        else if (  $("#idFiles")[0].files.length == 0){
            alert("Debe Ingresar el archivo del Pliego");
            $("#presupuesto").focus();

        }



        else {


            $.ajax({
                type: "POST",
                url: "altapliegoadm.php",
                data: form_data,
                success: function (response) {


                    if (response == 0) {


                        Swal.fire('El Pliego fue subido correctamente');
                        location.reload();

                        window.location.href = "modificapliegos.php";
                        /* swal({
                             title: "¿Está seguro que quiere modificar los datos de la persona?",
                             text: "Se modificarán los datos",
                             type: "warning",
                             showCancelButton: true,
                             confirmButtonClass: "btn-success",
                             confirmButtonText: "Modificar",
                             closeOnConfirm: false
                         }
                         */


                    } else if (response == 1) {
                        alert('El numero de contratacion ya existe para este tipo.');
                        swal('¡Error en la insercion!' + response);
                    }

                },
                error: function (response) {
                    swal('¡Error al subir el pliego!', '', 'error')
                }
            });

        }






            });










 $(".numero").on({
  "focus": function(event) {
    $(event.target).select();
  },
  "keyup": function(event) {
    $(event.target).val(function(index, value) {
      return value.replace(/\D/g, "")
        .replace(/([0-9])([0-9]{2})$/, '$1,$2')
        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
    });
  }
});
    $( "#presupuesto" ).change(function() {
      Swal.fire({
  title: '¿El importe del presupuesto es correcto?',
  text: "$ "+$( "#presupuesto" ).val(),
  showDenyButton: true,
  confirmButtonText: `Si`,
  denyButtonText: `No`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    var presupuesto = $("#presupuesto").val().replace('.', '');
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

    $( "#valor10" ).val(total);
    //var presupuesto = $( "#presupuesto" ).val().replace('.', '')
    Swal.fire('Completado!', '', 'success')

    $(this).removeClass("is-invalid");
  } else if (result.isDenied) {
    $(this).addClass("is-invalid");
    $( "#presupuesto" ).focus();
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
