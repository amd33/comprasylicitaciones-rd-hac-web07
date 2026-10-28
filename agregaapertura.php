?php 
include 'connecto2.php';
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
              <h1 class="">Modificar un Pliego</h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pliegos</a></div>
                <div class="breadcrumb-item">Modificar</div>
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
        <h4 class="modal-title" id="exampleModalLongTitle">Agregar apertura</h4>
      </div>
    <form method="POST" id="altapostulante" >
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
              <div class="card" style="margin-top: 5px">
                
                <div class="card-body row" >
                  <div class="form-group  col-md-6">
                       <h6>Numero de contratacion:</h6>
                       <input type="text"  required id="nrocontratacion" name="nrocontratacion" class="  form-control form-group" >
                     
                       
                      </div>
                      <div class="form-group  col-md-6">
                      
                     
                       
                      </div>
                  

                  

                       
                     
                      
                      <div class="form-group  col-6  ">
                        <h6>Descripcion de apertura:</h6>
                        <textarea class="form-control" required  id="objeto" style="width: 400px;height: 100px;" ></textarea>
                      </div>
                    
                       <div class="form-group  col-md-6">
                       <h6>Fecha y hora :</h6>
                       <input type="datetime-local" required  id="fechalimite" name="" class="  form-control form-group" >
                       
                      
                       
                      </div>
                     

                    
                   
                    
                  </form>
                    
                    
                    
                    

                    

                </div>  
                <div class="row">
                  
                  <div class=" col-2 offset-9 ">
                    <input type="submit" class=" btn btn-success btn-xl " id="Modificarpliego" value="Agregar apertura">
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
          
          nrocontratacion: $("#nrocontratacion").val(),
          
          objeto: $("#objeto").val(),
          fechalimite: $("#fechalimite").val().replace("T", " "),
          

          };
        $.ajax({
          type: "POST",
          url: "agregaaperturaadm.php",
          data: form_data,
          success: function(response)
          {
            console.log(response);
            if(response==0)
            {
                
               Swal.fire('¡Se subio correctamente la apertura!!', '', 'success')
               location.reload();
            }else{
              Swal.fire('¡Error en la insercion de la apertura!', response, 'error')
            }
             
          },
          error: function(response)
          {
              Swal.fire('¡Error al Modificar el pliego!', '', 'error')
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