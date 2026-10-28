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
            <a href="#">Postulantes </a>
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
          
        <div class="tab-pane fade show active" id="pills-postulante" role="tabpanel" aria-labelledby="pills-profile-tab">
        <form method="POST" id="altapostulante" >
          <section class="section">
            <div class="section-header">
              <h1 class="">Registro de postulante</h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Proveedores</a></div>
                <div class="breadcrumb-item">Postulante</div>
              </div>
            </div>

          <div class="section-body">
            
          <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Información Fiscal:</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
              <div class="col-md-3 form-group">
                  <label>Razon Social:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control requerido " name="informacionfiscalrazonsocial"   id="informacionfiscalrazonsocial" placeholder="RAZÓN SOCIAL" value=""></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
                <div class="col-md-3 form-group">
                  <label>CUIT:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control requerido" name="informacionfiscalcuit" id="informacionfiscalcuit" placeholder="CUIT"  data-inputmask="'mask': ['99-99999999-9']" data-mask></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label>Situacion Fiscal:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <select id="informacionfiscalsituacion" name="informacionfiscalsituacion" class="form-control requerido">
                          <option value="-1">SELECIONE</option>
                          <option value="monotributista">MONOTRIBUTISTA</option>
                          <option value="monoeventual">MONOTRIBUTISTA EVENTUAL</option>
                          
                          <option value="exento">EXENTO</option>
                          <option value="responsableinscripto">RESPONSABLE INSCRIPTO</option>
                          
                        </select>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label>Ingresos Brutos:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="requerido form-control sincaracteresespeciales" name="informacionfiscalingresosbrutos" id="informacionfiscalingresosbrutos" placeholder="INGRESOS BRUTOS" value=""></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Información Personal:</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
              <div class="col-md-2 form-group">
                  <label>Telefono:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="requerido form-control sincaracteresespeciales"  name="informacionpersonaltelefono"  id="informacionpersonaltelefono" placeholder="TELÉFONO" value=""></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
                <div class="col-md-3 form-group">
                  <label>Email:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="email" name="informacionpersonalemail" id="informacionpersonalemail" placeholder="EMAIL" class="requerido form-control"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label>Contraseña:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="password" class="form-control informacionpersonalcontraseña requerido" placeholder="CONTRASEÑA" id="informacionpersonalcontraseña" name="informacionpersonalcontraseña"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label>Repetir Contraseña:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="password" class="form-control requerido" placeholder="REPETIR CONTRASEÑA"  id="informacionpersonalrepetircontraseña" name="informacionpersonalrepetircontraseña"></input>
                        <div class="invalid-feedback">
                          Las contraseñas no coinciden!
                        </div>
                  </div>
                </div>
              </div> 
            </div>  
            </div>

            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Domicilio postal:</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
              <div class="col-md-2 form-group">
                  <label>Calle:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control requerido  sincaracteresespecialescontexto" name="domiciliopostalcalle"  id="domiciliopostalcalle" placeholder="CALLE"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label>Numero:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control requerido sincaracteresespeciales" name="domiciliopostalnumero"  id="domiciliopostalnumero" placeholder="NUMERO"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label>Piso:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control  sincaracteresespecialescontexto" name="domiciliopostalpiso"  id="domiciliopostalpiso" placeholder="PISO"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
              </div> 
              <div class="row">
              <div class="col-md-2 form-group">
                  <label>Departamento:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control  sincaracteresespecialescontexto" name="domiciliopostaldepartamento" id="domiciliopostaldepartamento" placeholder="DEPARTAMENTO"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>

                <div class="col-md-2 form-group">
                  <label>Localidad:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control requerido sincaracteresespecialescontexto" name="domiciliopostallocalidad" id="domiciliopostallocalidad" placeholder="LOCALIDAD"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>

                <div class="col-md-2 form-group">
                  <label>Codigo postal:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control requerido sincaracteresespeciales" name="domiciliopostalcodigopostal" id="domiciliopostalcodigopostal" placeholder="CÓDIGO POSTAL"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>


              </div>
            </div>  
            </div>

            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Domicilio Legal:</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
              <div class="col-md-2 form-group">
                  <label>Calle:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control requerido sincaracteresespecialescontexto" name="domiciliolegalcalle" id="domiciliolegalcalle" placeholder="CALLE"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label>Numero:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control requerido sincaracteresespeciales" name="domiciliolegalnumero"  id="domiciliolegalnumero" placeholder="NUMERO"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label>Piso:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control  sincaracteresespecialescontexto" name="domiciliolegalpiso"  id="domiciliolegalpiso" placeholder="PISO"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>
              </div> 
              <div class="row">
              <div class="col-md-2 form-group">
                  <label>Departamento:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control  sincaracteresespecialescontexto"  name="domiciliolegaldepartamento" id="domiciliolegaldepartamento" placeholder="DEPARTAMENTO"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>

                <div class="col-md-2 form-group">
                  <label>Localidad:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control requerido sincaracteresespecialescontexto" name="domiciliolegallocalidad"  id="domiciliolegallocalidad" placeholder="LOCALIDAD"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>

                <div class="col-md-2 form-group">
                  <label>Codigo postal:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <input  type="text" class="form-control requerido  sincaracteresespecialescontexto" name="domiciliolegalcodigopostal"  id="domiciliolegalcodigopostal" placeholder="CÓDIGO POSTAL"></input>
                        <div class="invalid-feedback">
                          Complete el campo!
                        </div>
                  </div>
                </div>


              </div>
            </div>  
            </div>



          </div>
          <h2 class="section-title col-md-12">Municipios</h2>   

<div class="form-group  col-md-2   offset-md-1">
  <select id="municipiosmunicipio" name="municipiosmunicipio" class="form-control requerido">
    <option value="-1"> SELECCIONE</option>
    <option value="vl"> VICENTE LÓPEZ</option>
    <option value="otros"> OTROS</option>
  </select>
  <div class="invalid-feedback">
    Complete el campo!
  </div>
</div>
<div class="form-group  col-md-2  vl" style="display:none">
  <input  type="text" class="form-control requerido sincaracteresespeciales" name="municipiosnhabilitacion"  id="municipiosnhabilitacion" placeholder="Nº HABILITACIÓN"></input>
  <div class="invalid-feedback">
    Complete el campo!
  </div>
</div>
<div class="form-group  col-md-2  vl" style="display:none">
  <input  type="text" class="form-control requerido sincaracteresespeciales" name="municipiosnpadron" id="municipiosnpadron" placeholder="Nº PADRÓN"></input>
  <div class="invalid-feedback">
    Complete el campo!
  </div>
</div>

<h2 class="section-title col-md-12">Archivos adjuntos</h2>   
<div class="form-group  col-md-4   offset-md-1">
  
  <label class="text-dark">SOLICITUD DE INSCRIPCION <a href="./archivos/solicitud de alta-modificacion.pdf" target="_blank" >DESCARGAR</a> <input type="file" required class="requerido form-control" id="idFiles" name="file" value="SOLICITUD DE INSCRIPCION" ></label>

  <label class="text-dark">CONSTANCIA DE INSCRIPCION DE AFIP <input type="file" required class="requerido form-control" id="idFiles1" name="file" value="CONSTANCIA DE INSCRIPCION DE AFIP" ></label>

  <label class="text-dark">CONSTANCIA DE INSCRIPCION DE IIBB O CONVENIO <input type="file" required class="requerido form-control" id="idFiles2" name="file" value="" ></label>

  <label class="text-dark">ULTIMOS 3 APORTES PREVISIONALES <input type="file" required class="requerido form-control" id="idFiles3" name="file" value="ULTIMOS 3 APORTES PREVISIONALES" ></label>

  <label class="text-dark">HABILITACION MUNICIPALIDAD DE VICENTE LÓPEZ <input type="file" required class="form-control" id="idFiles4" name="file" value="" ></label>


  <label class="text-dark empresa " style="display: none">ESTATUTO <input type="file"  class="form-control " id="idFiles8" name="file" value="" ></label>

  <label class="text-dark empresa " style="display: none">BALANCE <input type="file"  class="form-control " id="idFiles9" name="file" value="" ></label>
  <label class="text-dark empresa " style="display: none">ACTA DE DIRECTORIO <input type="file"  class="form-control " id="idFiles10" name="file" value="" ></label>
  <label class="text-dark empresa " style="display: none">PODER DEL FIRMANTE <input type="file"  class="form-control " id="idFiles11" name="file" value="" ></label>
  
  
  
  
  

</div>
<h2 class="section-title col-md-12">Rubros</h2>   
 <input  id="someinput" placeholder="BUSCAR ACTIVIDAD" class="form-control  col-md-10 offset-md-1">

<select class="select-cities col-md-10 offset-md-1 form-control " name="city" id="optlist"  multiple="multiple" style="height: 150px;"> 
    <?php
      
      $actividades="SELECT * FROM actividades";

      foreach ($db->query($actividades) as $row) {
        ?>
           <option class="text-uppercase" value="<?php echo $row['COD_ACTIVIDAD']; ?>"><?php echo $row['COD_ACTIVIDAD']." - ".$row['DESC_ACTIVIDAD']; ?></option>

       <?php }
      ?>
</select>


<h2 class="section-title col-md-12">Rubros Seleccionados</h2> 
<select class="chosen-cities col-md-10 offset-md-1 form-control requerido sincaracteresespeciales" name="optlist1"  id="optlist1" multiple="multiple" style="height: 150px;"></select>

<div class="form-group col-md-2   offset-10" style="margin-top: 40px;">
  <div class=" btn btn-success btn-xl submit" id="finalizar">FINALIZAR</div>
</div>
      
         

      
        </section>
      </form>
        
          <!-- FIN POSTULANTE -->

          <!-- INIFICO FIN POSTULANTE -->
        <div class="tab-pane fade " id="pills-postulantecompletado" role="tabpanel" aria-labelledby="pills-profile-tab" >
            <form method="POST" id="altapostulante" >
              <section class="section">
                <div class="section-header">
                  <h1 class="">Registro de postulante</h1>
                  <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Proveedores</a></div>
                    <div class="breadcrumb-item">Postulante</div>
                  </div>
                </div>

                <div class="section-body">
                  
                    <div class="row">
                    <div class="col-md-10 offset-md-1">
                      <div class="card">
                        
                        <div class="card-body row">
                          <div class="alert " role="alert" style="background-color: #8bc584; font-size: 16px;">
                            <h4 class="alert-heading" style="margin-bottom: 40px;">¡Finalizaste tu postulación!</h4>
                            <p style="margin-bottom: 40px;">
                              La Dirección de Compras y Licitaciones recibirá una notificación con su postulación.
                              Si la misma cumple todos los requisitos, se le enviará un correo electrónico solicitándole la documentación original para su verificación.
                              Una vez constatada la documentación, y previa conformidad de las autoridades de la Dirección de Compras y Licitaciones, se procederá a dar su alta definitiva como Proveedor. Mediante un correo electrónico se le enviará su Número de proveedor para acceder al sistema.
                              Si la postulación no cumple los requisitos, la Dirección de Compras y Licitaciones le informará tal situación mediante correo electrónico a fin de que la postulación sea corregida o bien desestimada.</p>
                            <hr>
                            <p class="mb-0">Será la Dirección de Compras y Licitaciones, la que previo al análisis de la documentación y antecedentes, decidirá su incorporación definitiva al Registro de Proveedores.</p>
                          </div>
                        </div>  
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </form>
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
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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

  
  
  <script>
    $(function () {

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
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
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
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
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
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
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
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
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
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
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
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }
          });
    });
    $('#idFiles6').change(function () {
          var data=new FormData();
          
          var idFiles=document.getElementById("idFiles6");
         
          var archivos=idFiles.files;
          for(var i=0;i<archivos.length;i++)
          {
            data.append("archive"+i,archivos[i]);
          }
          data=getFormData("altapostulante",data)
          $.ajax({
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }
          });
    });
    $('#idFiles7').change(function () {
          var data=new FormData();
          
          var idFiles=document.getElementById("idFiles7");
         
          var archivos=idFiles.files;
          for(var i=0;i<archivos.length;i++)
          {
            data.append("archive"+i,archivos[i]);
          }
          data=getFormData("altapostulante",data)
          $.ajax({
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }
          });
    });
    $('#idFiles8').change(function () {
          var data=new FormData();
          
          var idFiles=document.getElementById("idFiles8");
         
          var archivos=idFiles.files;
          for(var i=0;i<archivos.length;i++)
          {
            data.append("archive"+i,archivos[i]);
          }
          data=getFormData("altapostulante",data)
          $.ajax({
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }
          });
    });
    $('#idFiles9').change(function () {
          var data=new FormData();
          
          var idFiles=document.getElementById("idFiles9");
         
          var archivos=idFiles.files;
          for(var i=0;i<archivos.length;i++)
          {
            data.append("archive"+i,archivos[i]);
          }
          data=getFormData("altapostulante",data)
          $.ajax({
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }
          });
    });
    $('#idFiles10').change(function () {
          var data=new FormData();
          
          var idFiles=document.getElementById("idFiles10");
         
          var archivos=idFiles.files;
          for(var i=0;i<archivos.length;i++)
          {
            data.append("archive"+i,archivos[i]);
          }
          data=getFormData("altapostulante",data)
          $.ajax({
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }
          });
    });

    $('#idFiles11').change(function () {
          var data=new FormData();
          
          var idFiles=document.getElementById("idFiles11");
         
          var archivos=idFiles.files;
          for(var i=0;i<archivos.length;i++)
          {
            data.append("archive"+i,archivos[i]);
          }
          data=getFormData("altapostulante",data)
          $.ajax({
              url:"archivosubido.php",
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
                
                swal("Archivo subido con exito!",data.message,"success");
                
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }else{
                
                swal("Error en la carga del archivo!",data.message,"error");
                //$("#pills-postulante").removeClass("active show");
                //$("#pills-postulantecompletado").addClass("active show"); 
              }
          });
    });

    $('#municipiosmunicipio').change(function () {
          if ($(this).val()=="vl") {
            $('.vl').show("fadeIn");
            $('#municipiosnhabilitacion').val("");
            $('#municipiosnpadron').val("");
          }else{
            $('.vl').hide();
            $('#municipiosnhabilitacion').val("0");
            $('#municipiosnpadron').val("0");
            
            
          }

    });

    $('#informacionfiscalcuit').change(function () {
      $.ajax({
              type: "POST",
              url: "verificacupli.php",
              data: { cuit: $('#informacionfiscalcuit').val() },   
              success: function(data){
                  if (data==1) {
                    $("#finalizar").hide();
                    swal("¡Usted ya esta registrado en nuestra base de datos!","¡Verifique sus datos!","error");;
                  }else{
                    $("#finalizar").show();

                  }
              }
            });


        var divisiones = $(this).val().split("-")
        if ( (divisiones[0] == 33  ) || (divisiones[0] == 30  ) ) {
        

          $('.profesional').hide();
          $('.empresa').show("fadeIn");
          $("#idFiles8").prop('required',true);
          $("#idFiles9").prop('required',true);
          $("#idFiles10").prop('required',true);
          $("#idFiles11").prop('required',true);
          $("#idFiles8").addClass("requerido");
          $("#idFiles9").addClass("requerido");
          $("#idFiles10").addClass("requerido");
          $("#idFiles11").addClass("requerido");
          

        }else{

          $("#idFiles8").prop('required',false);
          $("#idFiles9").prop('required',false);
          $("#idFiles10").prop('required',false);
          $("#idFiles8").removeClass("requerido");
          $("#idFiles9").removeClass("requerido");
          $("#idFiles10").removeClass("requerido");
          $("#idFiles11").removeClass("requerido");
          $("#idFiles8").removeClass("is-invalid");
          $("#idFiles9").removeClass("is-invalid");
          $("#idFiles10").removeClass("is-invalid");
          $("#idFiles11").removeClass("is-invalid");
          $('.empresa').hide();
          $('.profesional').show("fadeIn");
          
        }
            
            
    });
    
    opts = $('#optlist option').map(function () {
        return [[this.value, $(this).text()]];
    });
    opts1 = $('#optlist1 option').map(function () {
        return [[this.value, $(this).text()]];
    });
     


    $('#someinput').keyup(function () {
        
        var rxp = new RegExp($('#someinput').val(), 'i');
        var optlist = $('#optlist').empty();
        opts.each(function () {
            if (rxp.test(this[1])) {
                optlist.append($('<option/>').attr('value', this[0]).text(this[1]));
            } else{
                optlist.append($('<option/>').attr('value', this[0]).text(this[1]).addClass("hidden"));
            }
        });
        $(".hidden").toggleOption(false);
    
    });
        $('#someinput1').keyup(function () {
        
        var rxp = new RegExp($('#someinput1').val(), 'i');
        var optlist = $('#optlist1').empty();
        opts1.each(function () {
            if (rxp.test(this[1])) {
                optlist.append($('<option/>').attr('value', this[0]).text(this[1]));
            } else{
                optlist.append($('<option/>').attr('value', this[0]).text(this[1]).addClass("hidden"));
            }
        });
        $(".hidden").toggleOption(false);
    
    });
    $('.select-cities').click(function () {
        $('.select-cities option:selected').remove().appendTo('.chosen-cities');
        opts = $('#optlist option').map(function () {
            return [[this.value, $(this).text()]];
        });
        opts1 = $('#optlist1 option').map(function () {
        return [[this.value, $(this).text()]];
    });
    });

    $('.chosen-cities').click(function () {
        $('.chosen-cities option:selected').remove().appendTo('.select-cities');
        opts = $('#optlist option').map(function () {
            return [[this.value, $(this).text()]];
        });
        opts1 = $('#optlist1 option').map(function () {
        return [[this.value, $(this).text()]];
    });
    });
   
    /**
     * Función que pone el archivo en un FormData
     * @return FormData
     */
    function getFiles()
    {
      
      // Creamos un objeto FormData, que nos permitira enviar un formulario
      // Este objeto, ya tiene la propiedad multipart/form-data
      var data=new FormData();
      // Recorremos todo el array de archivos y lo vamos añadiendo all
      // objeto data
      var idFiles=document.getElementById("idFiles");
      // Obtenemos el listado de archivos en un array
      var archivos=idFiles.files;
      for(var i=0;i<archivos.length;i++)
      {
        // Al objeto data, le pasamos clave,valor
        data.append("archive"+i,archivos[i]);
      }

      var idFiles1=document.getElementById("idFiles1");
      // Obtenemos el listado de archivos en un array
      var archivos=idFiles1.files;
      for(var i=0;i<archivos.length;i++)
      {
        // Al objeto data, le pasamos clave,valor
        data.append("archive"+i,archivos[i]);
      }

      var idFiles2=document.getElementById("idFiles2");
      // Obtenemos el listado de archivos en un array
      var archivos=idFiles2.files;
      for(var i=0;i<archivos.length;i++)
      {
        // Al objeto data, le pasamos clave,valor
        data.append("archive"+i,archivos[i]);
      }

      var idFiles3=document.getElementById("idFiles3");
      // Obtenemos el listado de archivos en un array
      var archivos=idFiles3.files;
      for(var i=0;i<archivos.length;i++)
      {
        // Al objeto data, le pasamos clave,valor
        data.append("archive"+i,archivos[i]);
      }

      var idFiles4=document.getElementById("idFiles4");
      // Obtenemos el listado de archivos en un array
      var archivos=idFiles4.files;
      for(var i=0;i<archivos.length;i++)
      {
        // Al objeto data, le pasamos clave,valor
        data.append("archive"+i,archivos[i]);
      }

     

      var idFiles6=document.getElementById("idFiles6");
      // Obtenemos el listado de archivos en un array
      var archivos=idFiles6.files;
      for(var i=0;i<archivos.length;i++)
      {
        // Al objeto data, le pasamos clave,valor
        data.append("archive"+i,archivos[i]);
      }

      var idFiles7=document.getElementById("idFiles7");
      // Obtenemos el listado de archivos en un array
      var archivos=idFiles7.files;
      for(var i=0;i<archivos.length;i++)
      {
        // Al objeto data, le pasamos clave,valor
        data.append("archive"+i,archivos[i]);
      }

      var idFiles8=document.getElementById("idFiles8");
      // Obtenemos el listado de archivos en un array
      var archivos=idFiles8.files;
      for(var i=0;i<archivos.length;i++)
      {
        // Al objeto data, le pasamos clave,valor
        data.append("archive"+i,archivos[i]);
      }

      var idFiles9=document.getElementById("idFiles9");
      // Obtenemos el listado de archivos en un array
      var archivos=idFiles9.files;
      for(var i=0;i<archivos.length;i++)
      {
        // Al objeto data, le pasamos clave,valor
        data.append("archive"+i,archivos[i]);
      }
      var idFiles10=document.getElementById("idFiles10");
      // Obtenemos el listado de archivos en un array
      var archivos=idFiles10.files;
      for(var i=0;i<archivos.length;i++)
      {
        // Al objeto data, le pasamos clave,valor
        data.append("archive"+i,archivos[i]);
      }
      return data;
    }
     

    /**
     * Función que recorre todo el formulario para apadir en el FormData los valores del formulario
     * @param string id hace referencia al id del formulario
     * @param FormData data hace referencia al FormData
     * @return FormData
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
   
     $('#finalizar').tooltip({'trigger':'hover', 'title': 'Finalizar Inscripcion'});
      $('#informacionfiscalsituacion').tooltip({'trigger':'focus', 'title': 'Situación ante AFIP'});
      $('#municipiosmunicipio').tooltip({'trigger':'focus', 'title': 'Municipio'});
      $('#archivos').tooltip({'trigger':'hover', 'title': 'Puede subir hasta 20 archivos'});
      $('[data-mask]').inputmask();

      $("#finalizar").click(function() {
        
        $('.requerido').each(function(){
           if(!$(this).val()){
            $(this).addClass("is-invalid");
            } else{
              if ($("#municipiosmunicipio").val() =="-1") {
                $("#municipiosmunicipio").addClass("is-invalid")
              }
              if ($("#informacionfiscalsituacion").val() =="-1") {
                $("#informacionfiscalsituacion").addClass("is-invalid")
              }
                $(this).removeClass("is-invalid");
            }
         });
         
        if($(".section-body").find(".is-invalid").length > 0)
        {
          
          swal("¡Faltan completar campos!","¡Verifique!","error");
            
            
        }else{
          var data=getFiles();
              data=getFormData("altapostulante",data);
              console.log(data);
              $.ajax({
                  url:"archivo.php",
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
                    
                    swal("Solicitud completada con éxito!","","success");
                    $('#optlist1 option').each(function() {
                      
                          $.ajax({
                              type: "POST",
                              url: "rubros.php",
                              data: { datita: $(this).val(), cuit: $('#informacionfiscalcuit').val() },   
                              success: function(data){

                                  //alert(data);
                                  
                              },
                            error: function(data)
                            {
                              alert("ERROR AL CARGAR EL RUBRO");
                            }
                            });
                    });
                    $("#pills-postulante").removeClass("active show");
                    $("#pills-postulantecompletado").addClass("active show"); 
                    

                        
                        var emailmod = $("#informacionpersonalemail").val();
                        var razonsocialmod = $("#informacionfiscalrazonsocial").val();
                          $.ajax({
                            type: "POST",
                            url: "mailconfirmaalta.php",
                            data: { email:emailmod ,razonsocial:razonsocialmod },   
                            success: function(data){
                                
                            }
                          });
                      
                  }else{
                    
                    swal("Error en la carga de datos!",data.message,"error");
                    //$("#pills-postulante").removeClass("active show");
                    //$("#pills-postulantecompletado").addClass("active show"); 
                  }
              });
              
         
        }


      });

      
      $('.requerido').blur(function(){
        if(!$(this).val()){
            $(this).addClass("is-invalid");
        } else{
            $(this).removeClass("is-invalid");
        }
    });
    $('#informacionpersonalrepetircontraseña').keyup(function(){
        if($('#informacionpersonalrepetircontraseña').val() == $('#informacionpersonalcontraseña').val()){
            $(this).removeClass("is-invalid");
        } else{
            $(this).addClass("is-invalid");
        }
    });  
    $('.sincaracteresespeciales').keyup(function(){
        if (!/^[ a-z0-9áéíóúüñ]*$/i.test(this.value)) {
          this.value = this.value.replace(/[^ a-z0-9áéíóúüñ]+/ig,"");
        
    }
    this.value = this.value.replace(/[^0-9]/g, '');
    });

    
     $('.sincaracteresespecialescontexto').keyup(function(){
        if (!/^[ a-z0-9áéíóúüñ]*$/i.test(this.value)) {
          this.value = this.value.replace(/[^ a-z0-9áéíóúüñ]+/ig,"");
        
    }
    
    });


});

jQuery.fn.toggleOption = function( show ) {
    jQuery( this ).toggle( show );
    if( show ) {
        if( jQuery( this ).parent( 'span.toggleOption' ).length )
            jQuery( this ).unwrap( );
    } else {
        if( jQuery( this ).parent( 'span.toggleOption' ).length == 0 )
            jQuery( this ).wrap( '<span class="toggleOption" style="display: none;" />' );
    }
};
  </script>     
</body>
</html>