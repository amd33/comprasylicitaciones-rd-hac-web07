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
              <h1 class="">Subir un Pliegos</h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pliegos</a></div>
                <div class="breadcrumb-item">Subir</div>
              </div>
            </div>

          <div class="section-body">
              <input type="text"  hidden="" id="recibo" name="recibo" value="10802358774">
              <div class="row">
              <div class="col-md-12">
                <div class="card" style="margin-top: 5px">
                  
                  
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
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
              <div class="card" style="margin-top: 5px">
                
                <div class="card-body row" >
                  <div class="form-group  col-md-12">
                       <h6>Titulo :</h6>
                       <input type="text" required  id="titulo" name="titulo" class="  form-control form-group" >
                     
                       
                      </div>
                  <div class="form-group  col-6    ">
                        <h6>Tipo de Contratación:</h6>

                        <select id="tipo" required  name="tipo" class="form-control requerido">
                          <option value="">TODOS</option>
                          <option value="CONCURSO DE PRECIOS">CONCURSO DE PRECIOS</option>
                          <option value="LICITACIÓN PÚBLICA">LICITACIÓN PÚBLICA</option>
                          <option value="LICITACION PRIVADA">LICITACIÓN PRIVADA</option>
                        </select>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                      </div>

                     <div class="form-group  col-md-6">
                       <h6>Numero de contratacion:</h6>
                       <input type="text"  required id="nrocontratacion" name="nrocontratacion" class="  form-control form-group" >
                     
                       
                      </div>

                        

                     <div class="form-group  col-6    ">
                        <h6>Sector:</h6>
                        <select id="sector" required  name="sector" class="form-control requerido">
                          <option>TODOS</option>
                          <option value="COMPRAS">COMPRAS</option>
                          <option value="HACIENDA">HACIENDA</option>
                          <option value="PLANEAMIENTO, OBRAS Y SERVICIOS PUBLICOS">PLANEAMIENTO, OBRAS Y SERVICIOS PUBLICOS</option>
                          <option value="SALUD">SALUD</option>
                          <option value="SEGURIDAD">SEGURIDAD</option>
                          <option value="EDUCACION">EDUCACION</option>
                          <option value="GENERAL">GENERAL</option>
                          <option value="GOBIERNO Y LEGAL Y TECNICA">GOBIERNO Y LEGAL Y TECNICA</option>
                          <option value="DEPORTES">DEPORTES</option>
                          <option value="CULTURA Y TURISMO">CULTURA Y TURISMO</option>
                          <option value="LEGAL Y TECNICA">LEGAL Y TECNICA</option>
                          <option value="COORDINACION">COORDINACION</option>
                          <option value="HONORABLE CONCEJO DELIBERANTE">HONORABLE CONCEJO DELIBERANTE</option>
                          <option value="SUBSECRETARIA DE PARTICIPACION CIUDADANA Y TRANSPARENCIA">SUBSECRETARIA DE PARTICIPACION CIUDADANA Y TRANSPARENCIA</option>
                          <option value="INSTITUTO DE FORMACION Y CAPACITACION EN SEGURIDAD PUBLICA">INSTITUTO DE FORMACION Y CAPACITACION EN SEGURIDAD PUBLICA</option>
                          <option value="INGRESOS PUBLICOS">INGRESOS PUBLICOS</option>
                          <option value="TRANSITO, TRANSPORTE PUBLICO Y SEGURIDAD VIAL">TRANSITO, TRANSPORTE PUBLICO Y SEGURIDAD VIAL</option>
                          <option value="FISCALIZACION Y CONTROL">FISCALIZACION Y CONTROL</option>
                          <option value="MODERNIZACION Y GOBIERNO DIGITAL">MODERNIZACION Y GOBIERNO DIGITAL</option>
                          <option value="DESARROLLO SOCIAL">DESARROLLO SOCIAL</option>
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
                        <h6>Objeto:</h6>
                        <textarea class="form-control" required  id="objeto" style="width: 400px;height: 100px;" ></textarea>
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
                    <div class=" col-6" >
                      <h6>Valor del Pliego:</h6>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" id="valor10" required  name="valor10" placeholder="VALOR DEL PLIEGO" class="numero is-invalid form-control form-group" >
                        <div class="input-group-prepend">
                          <div class="input-group-text">,00</div>
                        </div>
                      </div>
                       
                    </div>
                    
                  </form>
                    
                    <div class="form-group  col-md-12">
                      <h6>Archivos:</h6>
                       <label class="text-dark p-6 "> <input type="file" required class="requerido form-control" id="idFiles" name="file" value="Archivo 0" ></label>

                        <label class="text-dark p-6 "> <input type="file"  class="requerido form-control" id="idFiles1" name="file" value="Archivo 1" ></label>

                        <label class="text-dark p-6 "><input type="file"  class="requerido form-control" id="idFiles2" name="file" value="Archivo 2" ></label>

                        <label class="text-dark p-6 "> <input type="file"  class="requerido form-control" id="idFiles3" name="file" value="Archivo 3" ></label>

                        <label class="text-dark p-6 "> <input type="file"  class="form-control" id="idFiles4" name="file" value="Archivo 4" ></label>
                        <label class="text-dark p-6 "> <input type="file"  class="form-control" id="idFiles5" name="file" value="Archivo 5" ></label>
                    </div>
                    
                    

                    

                </div>  
                <div class="row">
                  
                  <div class=" col-2 offset-9 ">
                    <input type="submit" class=" btn btn-success btn-xl " id="subirpliego" value="SUBIR PLIEGO">
                  </div>
                </div>

              </div>
            </div>
          </div>
          
      </div>
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

    $('#nrocontratacion').change(function () {

      var titulo= $(this).val();
      var form_data = {
        titulo: $(this).val()
        

        };

      $.ajax({
        type: "POST",
        url: "nrocontratacion.php",
        data: form_data,
        success: function(response)
        {
          
          if (parseInt(titulo)==parseInt(response)) {
            Swal.fire('¡Error!', 'Ya existe esa contratacion', 'error');
            location.reload();
          }
           
        },
        error: function(response)
        {
            Swal.fire('¡Error!', 'Al determinar el nro de contratacion', 'error')
        }
      });

    });
    
    

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
            console.log(data);
              if(data.ok==1)
              {
                 Swal.fire({
                    icon: 'success',
                    title: '¡Hecho!',
                    text: 'Archivo subido con exito!',
                    footer: data.message
                  })
                

                
              }else{
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Error en la carga del archivo',
                    footer: data.message
                  })
                
              }
          });
    });
    $('#idFiles1').change(function () {
          var data=new FormData();
          
          var idFiles=document.getElementById("idFiles1");
         
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
            console.log(data);
              if(data.ok==1)
              {
                
                Swal.fire({
                    icon: 'success',
                    title: '¡Hecho!',
                    text: 'Archivo subido con exito!',
                    footer: data.message
                  })

                
              }else{
                
               Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Error en la carga del archivo',
                    footer: data.message
                  })
                
              }
          });
    });
    $('#idFiles2').change(function () {
          var data=new FormData();
          
          var idFiles=document.getElementById("idFiles2");
         
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
            console.log(data);
              if(data.ok==1)
              {
                
                Swal.fire({
                    icon: 'success',
                    title: '¡Hecho!',
                    text: 'Archivo subido con exito!',
                    footer: data.message
                  })

                
              }else{
                
               Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Error en la carga del archivo',
                    footer: data.message
                  })
                
              }
          });
    });
    $('#idFiles3').change(function () {
          var data=new FormData();
          
          var idFiles=document.getElementById("idFiles3");
         
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
            console.log(data);
              if(data.ok==1)
              {
                
                Swal.fire({
                    icon: 'success',
                    title: '¡Hecho!',
                    text: 'Archivo subido con exito!',
                    footer: data.message
                  })

                
              }else{
                
               Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Error en la carga del archivo',
                    footer: data.message
                  })
                
              }
          });
    });
    $('#idFiles4').change(function () {
          var data=new FormData();
          
          var idFiles=document.getElementById("idFiles4");
         
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
            console.log(data);
              if(data.ok==1)
              {
                
                Swal.fire({
                    icon: 'success',
                    title: '¡Hecho!',
                    text: 'Archivo subido con exito!',
                    footer: data.message
                  })

                
              }else{
                
               Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Error en la carga del archivo',
                    footer: data.message
                  })
                
              }
          });
    });
    $('#idFiles5').change(function () {
          var data=new FormData();
          
          var idFiles=document.getElementById("idFiles5");
         
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
            console.log(data);
              if(data.ok==1)
              {
                
                Swal.fire({
                    icon: 'success',
                    title: '¡Hecho!',
                    text: 'Archivo subido con exito!',
                    footer: data.message
                  })

                
              }else{
                
               Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Error en la carga del archivo',
                    footer: data.message
                  })
                
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

    $( "#altapostulante" ).submit(function( event ) {
      
      var form = $("#altapostulante");
      
      
      
          
          var form_data = {
          usuario:'1',
          titulo: $("#titulo").val(),
          tipo: $("#tipo").val(),
          nrocontratacion: $("#nrocontratacion").val(),
          sector: $("#sector").val(),
          apertura: $("#apertura").val(),
          objeto: $("#objeto").val(),
          presupuesto: $("#presupuesto").val(),
          apertura: $("#apertura").val().replace("T", " "),
          
          fechalimite: $("#fechalimite").val().replace("T", " "),
          
          valor10: $("#valor10").val(),

          };
        $.ajax({
          type: "POST",
          url: "altapliegoadm.php",
          data: form_data,
          success: function(response)
          {
            console.log(response);
            if(response==0)
            {
                
               Swal.fire('¡Se subio correctamente el pliego!!', '', 'success')
               location.reload();
            }else{
              Swal.fire('¡Error en la insercion!', response, 'error')
            }
             
          },
          error: function(response)
          {
              Swal.fire('¡Error al subir el pliego!', '', 'error')
          }
        });
      
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

        
  
  </script>     
</body>
</html>