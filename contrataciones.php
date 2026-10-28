 <?php 
include 'conect.php';
session_start();
if (!isset($_SESSION['usuario'])) {
  
  
  header("Status: 301 Moved Permanently");
  header("Location: https://www.vicentelopez.gov.ar/compras/proveedores/");
  exit;

}

$cantidaddemonotributistas="SELECT count(*) as totalmono FROM AGENTE 
WHERE id >= 167898 AND cuit>1 AND id IN (SELECT id  FROM postulante)
AND responsabilidad='monotributista' ";

foreach ($db->query($cantidaddemonotributistas) as $row) {
  $totaldemonotributistas=$row['TOTALMONO'];
 }

$cantidaddemonotributistas="SELECT count(*) as totalrespomsable FROM AGENTE 
WHERE id >= 167898 AND cuit>1 AND id IN (SELECT id  FROM postulante)
AND responsabilidad='responsableinscripto' ";

foreach ($db->query($cantidaddemonotributistas) as $row) {
  $responsablesinscriptos=$row['TOTALRESPOMSABLE'];
 }

$cantidaddemonotributistas="SELECT count(*) as totalgeneral FROM AGENTE 
WHERE  id >= 167898 AND cuit>1 AND id IN (SELECT id  FROM postulante) ";

foreach ($db->query($cantidaddemonotributistas) as $row) {
  $totalgeneral=$row['TOTALGENERAL'];
 }


  $cantidaddemonotributistas="SELECT count(*) totalgeneral FROM         LOGCONTRATADOS
WHERE  accioncontratados = 'DOCUMENTACION' AND id >= 167898 ";

foreach ($db->query($cantidaddemonotributistas) as $row) {
  $totalpedidodocu=$row['TOTALGENERAL'];
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Compras Y Licitaciones</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="
  https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

  <!-- CSS Libraries -->


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
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" id="cuitinfobuscador" placeholder="00-00000000-0" disabled="" aria-label="Search" data-width="250" style="width: 250px;">
            <a class="btn btn-info btn-action mr-1" data-toggle="modal" data-target="#info" data-email="danielchain2@gmail.com                                                                                                                                " data-razonsocial="" data-cuit="20141519558" data-responsabilidad="monotributista                                                                                      " data-correo="danielchain2@gmail.com                                                                                                                                " data-ib="20104242082" data-telefono="1144021010" data-comercialcodigo_postal="1414      " data-comerciallocalidad="                                        " data-comercialdepartamento="                                        " data-comercialpiso="     " data-comercialcalle="" data-comercialnumero="1661" data-legalcodigo_postal="1414      " data-legallocalidad="                                        " data-legaldepartamento="                                        " data-legalpiso="     " data-legalcalle="" data-legalnumero="1661"><i class="fas fa-search"></i></a>
            <div class="search-backdrop"></div>
            
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="fas fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Mensajes
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b></b>
                    <p></p>
                    <div class="time"></div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
           -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block nombreyapellido">Hola, <?php echo $_SESSION['usuario']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="fas fa-user"></i> Perfil
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="index.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Salir
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Compras Y Licitaciones </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img width="25px" height="25px" src="https://citymis.co/custom/vicentelopez/public/_img/logo.png" alt=""></a>
          </div>
          

          <!-- Tab panes -->
          
          <ul class="sidebar-menu" >
            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Contrataciones</span></a>
                <ul class="nav nav-tabs dropdown-menu" id="pills-tab" role="tablist">
            <?php
            $pos  = strpos($_SESSION['usuario'], "AMENDOLA");
            $pos1 = strpos($_SESSION['usuario'], "LIPAROTI");
            $pos2 = strpos($_SESSION['usuario'], "ANGEL ALVAREZ");
            $pos3 = strpos($_SESSION['usuario'], "ALBERTO PANICHELLI");
            $pos4 = strpos($_SESSION['usuario'], "JORGE PIERSANTI");
             


            
            if ( ($pos === false) && ($pos1 === false) && ($pos2 === false) && ($pos3 === false) && ($pos4 === false) ) {
               ?> 

               <li class="nav-item ">
                  <a class="nav-link " href="#pills-rubros" role="tab" data-toggle="tab">Rubros</a>
                </li>
               <?php
            } else {
                ?>
                
                  <li class="nav-item">
                <a class="nav-link   " href="#pills-postulados" role="tab" data-toggle="tab" aria-selected="true">Postulados </a>
                
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#pills-proveedores" role="tab" data-toggle="tab">Proveedores</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link " href="#pills-rubros" role="tab" data-toggle="tab">Rubros</a>
                </li>
                <?php
            }
            ?>
            

            
                </ul>
              </li>
              
             <!--  <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Licitaciones</span></a>
                <ul class="dropdown-menu">
                  <li><a href="licitaciones.php">Activas</a></li>
                  <li><a class="nav-link" href="licitaciones.php">Publicadas</a></li>
                  <li><a href="licitaciones.php">Notas</a></li>
                </ul>
              </li> -->
            </ul>
            
        </aside>
        
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade " id="pills-postulados" role="tabpanel" aria-labelledby="pills-home-tab">
            <section class="section">
              <div class="section-header">
                <h1>Postulados</h1>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="#">Contrataciones</a></div>
                  <div class="breadcrumb-item">Postulados</div>
                </div>
              </div>            
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                      <i class="fas fa-user-check"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>MONOTRIBUTISTAS</h4>
                      </div>
                      <div class="card-body">
                        <?php echo $totaldemonotributistas;?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                      <i class="fas fa-user-clock"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>RESPONSABLES INSCRIPTOS</h4>
                      </div>
                      <div class="card-body">
                        <?php echo $responsablesinscriptos;?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="fas fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>AGUARDANDO DOCUMENTACION</h4>
                      </div>
                      <div class="card-body">
                        <?php echo $totalpedidodocu; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                      <i class="fas fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total</h4>
                      </div>
                      <div class="card-body">
                        <?php echo $totalgeneral;?>
                      </div>
                    </div>
                  </div>
                </div>                
              </div>
              <div class="cargando" style="display: block"><img src="loading-spinner-bzn.gif" style="display:block;margin:auto;" alt="cargando" class="img-fluid" ></div>
              <div class="row divpostulante"  style="display:none">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                  <div class="card">
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table id="postulante" class="table table-striped table-bordered dt-responsive nowrap" >
                                <thead>
                                    <tr>
                                        <th>CUIT</th>
                                        <th>Razon Social</th>
                                        <th>Estado</th>
                                        <th>Inscripcion</th>
                                        <th>Correo</th>
                                        <th class="text-center">Accion</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodypostulante">
                                </tbody>
                            </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="tab-pane fade " id="pills-proveedores" role="tabpanel" aria-labelledby="pills-profile-tab">
          <section class="section">
          <div class="section-header">
            <h1>Proveedores</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Contrataciones</a></div>
              <div class="breadcrumb-item">Proveedores</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Proveedores</h2>
            <p class="section-lead">
              Podes hacer la busqueda por  <code>NUMERO DE PROVEEDOR</code> o por <code>RAZON SOCIAL</code> 
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  
                  <div class="card-body">
                    <div class="row mb-6">
                      <div class="col-xs-12 col-md-6 col-lg-6 ">
                        <form id="search-form">
                          <div class="input-group">
                            <input type="text" id="nro_prov" class="form-control" placeholder="Proveedor">
                            <!--<input type="text" id="cuitbusqueda" class="form-control" placeholder="00-00000000-0">-->
                            <div class="input-group-append">
                              <div class="btn btn-primary buscarproveedor">Buscar</div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                   <!-- <div class="alert alert-info">
                      You can type the destination razonsocialbusqueda in the form above then the marker will appear on the map according to your address.
                    </div>-->

                    <!---->
                    <div class="cargandoproveedores" style="display: block"><img src="loading-spinner-bzn.gif" style="display:none;margin:auto;" alt="cargandoproveedores" class="img-fluid" ></div>
                    <div class="row divproveedores"  style="display:none">
                      <div class="col-lg-10 col-md-10  col-sm-10 ">
                        <div class="card ">
                          <div class="card-header">
                            <h4>Datos del proveedor</h4>
                          </div>
                          <div class="card-body   row">
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedorcodprov" class="col-form-label">Numero de proveedor :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedorcodprov"></input>
                          </div>
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedorcuit" class="col-form-label">Cuit :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedorcuit"></input>
                          </div>
                          <div class="form-group  col-md-4  col-sm-4 ">
                            <label for="modalproveedorrazonsocial" class="col-form-label">Razón Social:</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedorrazonsocial"></input>
                          </div>
                          
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedorfantasia" class="col-form-label">Fantasia :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedorfantasia"></input>
                          </div>
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedortiposoc" class="col-form-label">Tipo Soc :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedortiposoc"></input>
                          </div>
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedoringbrutos" class="col-form-label">Ing Brutos :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedoringbrutos"></input>
                          </div>
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedorfechaalta" class="col-form-label">Fecha de Alta :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedorfechaalta"></input>
                          </div>
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedorfechaultcompra" class="col-form-label">Fecha ult Comp :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedorfechaultcompra"></input>
                          </div>
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedordireccion" class="col-form-label">Direccion:</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedordireccion"></input>
                          </div>
                          
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedorpisodpto" class="col-form-label">Piso-Dpto :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedorpisodpto"></input>
                          </div>
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedorlocalidad" class="col-form-label">Localidad :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedorlocalidad"></input>
                          </div>
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedorprovincia" class="col-form-label">Provincia :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedorprovincia"></input>
                          </div>
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedoremail" class="col-form-label">Email :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedoremail"></input>
                          </div>
                          <div class="form-group  col-md-4  col-sm-4">
                            <label for="modalproveedorcelular" class="col-form-label">Celular :</label>
                            <input type="text" class="form-control" disabled="" id="modalproveedorcelular"></input>
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-10 col-md-10  col-sm-10 ordenesdecompra">
                        <div class="card">
                          <div class="card-header">
                            <h4>Ordenes de compra</h4>
                          </div>
                          <div class="card-body p-0">
                            <div class="table-responsive" style="padding: 15px;">
                              <table id="proveedores" class="table table-striped" style="padding: 15px;" >
                                  <thead>
                                      <tr>
                                          <th>Orden de compra</th>
                                          <th>Ejercicio</th>
                                          <th>Fecha </th>
                                          <th>Fecha de confirmacion</th>
                                          <th>Importe</th>
                                          
                                      </tr>
                                  </thead>
                                  <tbody id="tbodyproveedores">
                                  </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
          </div>
          <div class="tab-pane fade" id="pills-rubros" role="tabpanel" aria-labelledby="pills-rubros-tab">
          <section class="section">
          <div class="section-header">
            <h1>Rubros</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Contrataciones</a></div>
              <div class="breadcrumb-item">Rubros</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Rubros</h2>
            <div class="row">
              <div class="col-12">
                <div class="card">
                   <!---->
                    
                    <div class="row divrubrosexistentes">
                      
                      <div class="col-lg-12 col-md-12  col-sm-12 rubrosexistes">
                        <div class="card">
                          
                          <div class="card-body p-0">
                            <div class="table-responsive" style="padding: 15px;">
                              <table id="rubrosexistentes" class="table table-striped" style="padding: 15px;" >
                                  <thead>
                                      <tr>
                                          <th>COD_RUBRO</th>
                                          <th>DESCRIPCION_RUBRO</th>
                                          <th>COD_SUBRUBRO </th>
                                          <th>DESCRIPCION_SUBRUBRO</th>                                          
                                      </tr>
                                  </thead>
                                  <tbody id="tbodyrubrosexistentes">
                                  </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- -->
                  <h2 class="section-title">Sub-rubro</h2>
                    <p class="section-lead">
                      Podes hacer la busqueda por  <code>CODIGO DE RUBRO</code> 
                    </p>  
                  <div class="card-body" id="anchorpararedi">
                    <div class="row mb-6">
                      <div class="col-xs-12 col-md-6 col-lg-6 ">
                        <form id="search-form">
                          <div class="input-group">
                            <input type="text" id="nro_rubro" class="form-control" placeholder="rubro">
                             <input type="text" id="nro_subrubro" class="form-control" placeholder="subrubro">
                            <!--<input type="text" id="cuitbusqueda" class="form-control" placeholder="00-00000000-0">-->
                            <div class="input-group-append">
                              <div class="btn btn-primary buscarubros">Buscar</div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                   <!-- <div class="alert alert-info">
                      You can type the destination razonsocialbusqueda in the form above then the marker will appear on the map according to your address.
                    </div>-->
                     <!---->
                    <div class="cargandorubros" style="display: block"><img src="loading-spinner-bzn.gif" style="display:none;margin:auto;" alt="cargandorubros" class="img-fluid" ></div>
                    <div class="row divrubros"  style="display:none">
                      <div class="col-lg-12 col-md-12  col-sm-12 rubros">
                        <div class="card">
                          <div class="card-header">
                            <h4>Proveedores</h4>
                          </div>
                          <div class="card-body p-0">
                            <div class="table-responsive" style="padding: 15px;">
                              <table id="rubros" class="table table-striped" style="padding: 15px;" >
                                  <thead>
                                      <tr>
                                          <th>DESCRIPCION_SUBRUBRO</th>
                                          <th>RAZON_SOCIAL</th>
                                          <th>CUIT </th>
                                          <th>EMAIL</th>
                                          <th>DESCRIPCION </th>
                                          <th>FECHA_ULT_COMP</th>                                
                                      </tr>
                                  </thead>
                                  <tbody id="tbodyrubros">
                                  </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
          </div>
        </div>
        
      </div>
      <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 >Información</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h2 class="section-title modal-title"></h2>
              <form>
                <div class="card">
                  
                  <div class="card-body row">
                    <div class="form-group col-md-3" >
                      <label for="cuitmodalinfo" class="col-form-label">Cuit</label>
                      <input type="text" readonly="" class="form-control" id="cuitmodalinfo">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="razonsocialmodalinfo" class="col-form-label">Razon social</label>
                      <input type="text" readonly="" class="form-control" id="razonsocialmodalinfo">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="situacionafipmodalinfo" class="col-form-label">Situacion afip</label>
                      <input type="text" readonly="" class="form-control" id="situacionafipmodalinfo">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="iibbmodalinfo" class="col-form-label">IIBB</label>
                      <input type="text" readonly="" class="form-control" id="iibbmodalinfo">
                    </div>
                  
                    <div class="form-group col-md-3" >
                      <label for="telefonomodalinfo" class="col-form-label">Telefono</label>
                      <input type="text" readonly="" class="form-control" id="telefonomodalinfo">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="emailmodalinfo" class="col-form-label">Email</label>
                      <input type="text" readonly="" class="form-control" id="emailmodalinfo">
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="col-md-12 card-header"><h5>Domicilio Postal</h5> </div>
                  <div class="card-body row">
                    <div class="form-group col-md-3" >
                      <label for="callemodalinfo" class="col-form-label">Domicilio</label>
                      <input type="text"  readonly="" class="form-control" id="callemodalinfo">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="pisomodalinfo" class="col-form-label">Piso</label>
                      <input type="text"  readonly="" class="form-control" id="pisomodalinfo">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="departamentomodalinfo" class="col-form-label">Departamento</label>
                      <input type="text"  readonly="" class="form-control" id="departamentomodalinfo">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="localidadmodalinfo" class="col-form-label">Localidad </label>
                      <input type="text"  readonly="" class="form-control" id="localidadmodalinfo">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="localidadmodalinfo" class="col-form-label">Codigo postal</label>
                      <input type="text"  readonly="" class="form-control" id="cpostalmodalinfo">
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="col-md-12 card-header"><h5>Domicilio Legal</h5> </div>
                  <div class="card-body row">

                    <div class="form-group col-md-3" >
                      <label for="callemodalinfolegal" class="col-form-label">Domicilio</label>
                      <input type="text"  readonly="" class="form-control" id="callemodalinfolegal">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="pisomodalinfolegal" class="col-form-label">Piso</label>
                      <input type="text"  readonly="" class="form-control" id="pisomodalinfolegal">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="departamentomodalinfolegal" class="col-form-label">Departamento</label>
                      <input type="text"  readonly="" class="form-control" id="departamentomodalinfolegal">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="localidadmodalinfolegal" class="col-form-label">Localidad </label>
                      <input type="text"  readonly="" class="form-control" id="localidadmodalinfolegal">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="cpostalmodalinfolegal" class="col-form-label">Codigo postal</label>
                      <input type="text" readonly="" class="form-control" id="cpostalmodalinfolegal">
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="col-md-12 card-header"><h5>Archivos</h5> </div>
                  <div class="card-body row" id="archivosporcuit">

                      
                  </div>
                </div>
                <div class="card">
                  <div class="col-md-12 card-header"><h5>Rubros</h5> </div>
                  <div class="card-body row" id="rubrosporcuit">

                      
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <!-- <button type="button" class="btn btn-primary">Enviar</button> -->
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="aprobar" tabindex="-1" role="dialog" aria-labelledby="aprobarLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 >Aprobar </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h2 class="section-title modal-title"></h2>
              <form>
                <div class="form-group">
                  <label for="emailmodalaprobar" class="col-form-label">Email:</label>
                  <input type="text" class="form-control"  id="emailmodalaprobar">
                </div>
                <div class="form-group">
                  <label for="razonsocialmodalaprobar" class="col-form-label">Razon social:</label>
                  <input type="text" class="form-control" readonly="" id="razonsocialmodalaprobar">
                </div>
                <div class="form-group">
                  <label for="cuitmodalaprobar" class="col-form-label">Cuit:</label>
                  <input type="text" class="form-control" readonly="" id="cuitmodalaprobar">
                </div>
                <div class="form-group">
                  <label  class="col-form-label">Numero de Proveedor:</label>
                  <input type="text" class="form-control"  id="message-text">
                </div>
              
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="aprobarporemail">Aprobar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="proveedorsender" tabindex="-1" role="dialog" aria-labelledby="proveedorsenderLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 >Información</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body ">
              <h2 class="section-title modal-title"></h2>
              <form class="row">
                <div class=" col-md-4">
                  <label for="modalejerciciooc" class="col-form-label">Ejercicio:</label>
                  <input type="text" class="form-control" disabled="" id="modalejerciciooc">
                </div>
                <div class=" col-md-4">
                  <label for="modalunioc" class="col-form-label">Uni:</label>
                  <input type="text" class="form-control" disabled="" id="modalunioc">
                </div>
                <div class=" col-md-4">
                  <label for="modalnroadjudoc" class="col-form-label">Numero de adjudi:</label>
                  <input type="text" class="form-control" disabled="" id="modalnroadjudoc">
                </div>
                <div class=" col-md-4">
                  <label for="modalfechococ" class="col-form-label">Fecha:</label>
                  <input type="text" class="form-control" disabled="" id="modalfechococ">
                </div>
                <div class=" col-md-4">
                  <label for="modallugemioc" class="col-form-label">Lugar de Emision:</label>
                  <input type="text" class="form-control" disabled="" id="modallugemioc">
                </div>
                <div class=" col-md-4">
                  <label for="modalcodlugentoc" class="col-form-label">Lugar de entrega:</label>
                  <input type="text" class="form-control" disabled="" id="modalcodlugentoc">
                </div>
                <div class=" col-md-4">
                  <label for="modaltipodocaproboc" class="col-form-label">Tipo:</label>
                  <input type="text" class="form-control" disabled="" id="modaltipodocaproboc">
                </div>
                <div class=" col-md-4">
                  <label for="modalnrodocaproboc" class="col-form-label">Nro Doc Aprobado:</label>
                  <input type="text" class="form-control" disabled="" id="modalnrodocaproboc">
                </div>
                <div class=" col-md-4">
                  <label for="modalaniodocaproboc" class="col-form-label">Año Doc Aprobado:</label>
                  <input type="text" class="form-control" disabled="" id="modalaniodocaproboc">
                </div>
                <div class=" col-md-4">
                  <label for="modalfechconfirmoc" class="col-form-label">Fecha de confirmacion:</label>
                  <input type="text" class="form-control" disabled="" id="modalfechconfirmoc">
                </div>
                <div class=" col-md-4">
                  <label for="modalimportetotoc" class="col-form-label">Importe total:</label>
                  <input type="text" class="form-control" disabled="" id="modalimportetotoc">
                </div>
                <div class=" col-md-4">
                  <label for="modalocdiferidooc" class="col-form-label">Diferido:</label>
                  <input type="text" class="form-control" disabled="" id="modalocdiferidooc">
                </div>
                <div class=" col-md-4">
                  <label for="modalobservacionoc" class="col-form-label">Observación:</label>
                  <textarea class="form-control" disabled=""  id="modalobservacionoc" ></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="proveedormodal" tabindex="-1" role="dialog" aria-labelledby="proveedormodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 >Información</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="modal_body">
              
            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="emailsender" tabindex="-1" role="dialog" aria-labelledby="emailsenderLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 >Pedir documentacion</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h2 class="section-title modal-title"></h2>
              <form>
                <div class="form-group">
                  <label for="" class="col-form-label">Email:</label>
                  <input type="text" class="form-control"  id="modalemailsender">
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Cuit:</label>
                  <input type="text" class="form-control" disabled="" id="modalcuitsender">
                </div>
                <div class="form-group">
                  <label for="modalemailrazonsocial" class="col-form-label">Razon Social:</label>
                  <textarea class="form-control" id="modalemailrazonsocial"></textarea>
                </div>
                <div class="form-group">
                  <label for="message-text-sender" class="col-form-label">Texto:</label>
                  <textarea class="form-control" id="message-text-sender"><b>Quedaron algunas cosas pendientes. </b><br>Necesitamos pedirle mas información, no llegaron algunos archivos los archivos faltantes son los siguientes :</textarea>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="enviaemail">Enviar Email</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="bitacora" tabindex="-1" role="dialog" aria-labelledby="bitacoraLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class=""  id="bitacoraLabel" >Actividad</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!---->
                <div class="section-body">
                  <h2 class="section-title modal-title"></h2>
                  <div class="row">
                    <div class="col-12">
                      <div class="activities" id="activities">
                        
                      </div>
                    </div>
                  </div>
                </div>
              <!---->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class=""  id="deleteLabel" >ELIMINAR</h5>

              
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!---->
                <div class="section-body">
                  <h2 class="section-title modal-title"> </h2>
                  <div class="row">
                    <div class="col-12">
                      <div class="rowdelete" id="rowdelete">
                        <b>VAS A ELIMINAR EL CUIT:
                          <input type="text"  class="form-control" readonly="" name="" id="inputdelete"><br><br>

                        ¿ESTAS SEGURO?</b>
                      </div>

                    </div>
                  </div>
                </div>
              <!---->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger eliminarboton" >Eliminar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

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
  <!-- Modal -->
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->
 

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
    $(document).ready(function() {
      $('.toast').toast('show');

      $(".eliminarboton").click(function() {
        var cuit = $("#inputdelete").val();
          $.ajax({
            type: "POST",
            url: "deletepostulante.php",
            data: { cuit:cuit },   
            success: function(data){
                swal("¡Eliminado!", "¡Eliminaste al postulante "+cuit, "success")
                setTimeout( function() { 
                location.reload(); 
              }, 1000);

                
            }
          });
      })
     


      $.ajax({
          type: "POST",
          url: "getPostulante.php",
          //data: form_data,
          data: { usuario: $(".nombreyapellido").text() }, 
          success: function(response)
          {  

            if(response.length>2){
              $('#postulante').DataTable().destroy();
              $(".exportaexcel").fadeIn("slow");
              $('#tbodypostulante').html(response).fadeIn();
              $(".cargando").hide();
              $(".divpostulante").fadeIn("slow");
              $('#postulante').DataTable(  {
                    dom: 'Bfrtip',
                    buttons: [
                    {

                        text: 'Exportar a PDF',
                        extend: 'pdf',
                        className: 'btn btn-success btn-xs'
                    },
                    {
                        text: 'Imprimir',
                        extend: 'print',
                        className: 'btn btn-warning btn-xs'
                    },
                    {
                        text: 'Exportar a Excel',
                        extend: 'excel',
                        className: 'btn btn-danger btn-xs'
                    }
                    ,
                    {
                        text: 'Copiar en el Portapapeles',
                        extend: 'copy',
                        className: 'btn btn-info btn-xs'
                    }
                    ]
              });
            }else{

              swal ( "¡Nada por Aquí, Nada por Allá!" ,  "No existen resultados con este criterio de búsqueda ",  "error" );
              $(".cargando").hide();
            }
             
          },
          error: function(response)
          {
          }
        });

      $('.infoporcuit').on('show.bs.modal', function (event) {
        

        $.ajax({
            type: "POST",
            url: "rubrosporcuit.php",
            data: { cuit: cuit },   
            success: function(data){

                if(data>0){
                  var modal = $(this)
                   var modal = $(this)
                  cuitinfobuscador
                  //modal.find('.modal-title').text(cuit)
                  modal.find('#razonsocialmodalinfo').val(razonsocial)
                  modal.find('#cuitmodalinfo').val(cuit)
                  modal.find('#situacionafipmodalinfo').val(responsabilidad)
                  modal.find('#iibbmodalinfo').val(ib)
                  modal.find('#telefonomodalinfo').val(telefono)
                  modal.find('#emailmodalinfo').val(correo)

                  modal.find('#callemodalinfo').val(comercialcalle+" "+comercialnumero)
                  modal.find('#pisomodalinfo').val(comercialpiso)
                  modal.find('#departamentomodalinfo').val(comercialdepartamento)
                  modal.find('#localidadmodalinfo').val(comerciallocalidad)
                  modal.find('#cpostalmodalinfo').val(comercialcodigo_postal)


                  modal.find('#callemodalinfolegal').val(legalcalle+" "+legalnumero)
                  modal.find('#pisomodalinfolegal').val(legalpiso)
                  modal.find('#departamentomodalinfolegal').val(legaldepartamento)
                  modal.find('#localidadmodalinfolegal').val(legallocalidad)
                  modal.find('#cpostalmodalinfolegal').val(legalcodigo_postal)
                  
                  $.ajax({
                      type: "POST",
                      url: "rubrosporcuit.php",
                      data: { cuit: cuit },   
                      success: function(data){

                          $('#rubrosporcuit').html(data);
                          
                      },
                    error: function(data)
                    {
                      alert("error");
                    }
                    });
                  
                  
                  
                  
                  $.ajax({
                      type: "POST",
                      url: "archivosporcuit.php",
                      data: { cuit: cuit },   
                      success: function(data){

                          $('#archivosporcuit').html(data);
                          
                      },
                    error: function(data)
                    {
                      alert("error");
                    }
                    });

                }else{
                   swal("¡Sin resultados!", "¡No se ecnontraron resultados para esta busqueda!", "info")
                }
                
            },
          error: function(data)
          {
            alert("error");
          }
          });
        
        
      })

      $('#info').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var cuit = button.data('cuit') // Extract info from data-* attributes
        var razonsocial = button.data('razonsocial')
        var responsabilidad = button.data('responsabilidad')
        var correo = button.data('correo')
        var ib = button.data('ib')
        var telefono = button.data('telefono')


        // Extract info from data-* attributes
        var comercialcodigo_postal = button.data('comercialcodigo_postal') 
        var comerciallocalidad = button.data('comerciallocalidad')
        var comercialdepartamento = button.data('comercialdepartamento')
        var comercialpiso = button.data('comercialpiso')
        var comercialcalle = button.data('comercialcalle')
        var comercialnumero = button.data('comercialnumero')
         // Extract info from data-* attributes
        var legalcodigo_postal = button.data('legalcodigo_postal')
        var legallocalidad = button.data('legallocalidad')
        var legaldepartamento = button.data('legaldepartamento')
        var legalpiso = button.data('legalpiso')
        var legalcalle = button.data('legalcalle')
        var legalnumero = button.data('legalnumero')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        //modal.find('.modal-title').text(cuit)
        modal.find('#razonsocialmodalinfo').val(razonsocial)
        modal.find('#cuitmodalinfo').val(cuit)
        modal.find('#situacionafipmodalinfo').val(responsabilidad)
        modal.find('#iibbmodalinfo').val(ib)
        modal.find('#telefonomodalinfo').val(telefono)
        modal.find('#emailmodalinfo').val(correo)

        modal.find('#callemodalinfo').val(comercialcalle+" "+comercialnumero)
        modal.find('#pisomodalinfo').val(comercialpiso)
        modal.find('#departamentomodalinfo').val(comercialdepartamento)
        modal.find('#localidadmodalinfo').val(comerciallocalidad)
        modal.find('#cpostalmodalinfo').val(comercialcodigo_postal)


        modal.find('#callemodalinfolegal').val(legalcalle+" "+legalnumero)
        modal.find('#pisomodalinfolegal').val(legalpiso)
        modal.find('#departamentomodalinfolegal').val(legaldepartamento)
        modal.find('#localidadmodalinfolegal').val(legallocalidad)
        modal.find('#cpostalmodalinfolegal').val(legalcodigo_postal)
        
        
        
        
        

        
        $.ajax({
            type: "POST",
            url: "rubrosporcuit.php",
            data: { cuit: cuit },   
            success: function(data){

                $('#rubrosporcuit').html(data);
                
            },
          error: function(data)
          {
            alert("error");
          }
          });
        
        
        
        
        $.ajax({
            type: "POST",
            url: "archivosporcuit.php",
            data: { cuit: cuit },   
            success: function(data){

                $('#archivosporcuit').html(data);
                
            },
          error: function(data)
          {
            alert("error");
          }
          });
        
      })
      $('#aprobar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var cuit = button.data('cuit') // Extract info from data-* attributes
        var emailmodalaprobar = button.data('email') // Extract info from data-* attributes
        var modalemailrazonsocial = button.data('razonsocial')
        
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        //modal.find('.modal-title').text(cuit)
        $('#cuitmodalaprobar').val(cuit)
        $('#emailmodalaprobar').val(emailmodalaprobar)
        $('#razonsocialmodalaprobar').val(modalemailrazonsocial)
        
      })
      $('#bitacora').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var cuit = button.data('cuit') // Extract info from data-* attributes
        $.ajax({
          type: "POST",
          url: "getLogs.php",
          data: { cuit:cuit },
          success: function(response)
          {  
             $('#activities').html(response);
          },
          error: function(response)
          {
          }
        });
        
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        //modal.find('.modal-title').text(cuit)
        modal.find('.modal-body input').val(cuit)
      })
      $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var cuit = button.data('cuit') // Extract info from data-* attributes
        var emailmodalaprobar = button.data('email') // Extract info from data-* attributes
        var modalemailrazonsocial = button.data('razonsocial')
        
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        //modal.find('.modal-title').text(cuit)
        
        $('#inputdelete').val(cuit);
      })

      $('#emailsender').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var email = button.data('email')
        var modalemailrazonsocial = button.data('razonsocial')
        var cuit = button.data('cuit')
        
         // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        $('#modalcuitsender').val(cuit);
        modal.find('.modal-title').text('Enviar pedido de informacion  a ' + email)
        $('#modalemailsender').val(email)
        $('#modalemailrazonsocial').val(modalemailrazonsocial)
      })
      $("#enviaemail").click(function() {
        var textomod = $("#message-text-sender").val();
        var emailmod = $("#modalemailsender").val();
        var razonsocialmod = $("#modalemailrazonsocial").val();
          $.ajax({
            type: "POST",
            url: "email.php",
            data: { email:emailmod, texto:textomod ,razonsocial:razonsocialmod },   
            success: function(data){
                swal("¡Enviado!", "¡Pedido de informacion enviado!", "success")
            }
          });
        
        var cuit = $('#modalcuitsender').val()
        $.ajax({
          type: "POST",
          url: "generaEstado.php",
          data: { cuit:cuit, texto: "DOCUMENTACION" ,comentario: "PEDIDO DE DOCUMENTACION A "+emailmod },
          success: function(response)
          {  
             console.log(response);
          },
          error: function(response)
          {
          }
        });

      })
      $("#aprobarporemail").click(function() {
        var textomod = $("#message-text").val();
        var emailmod = $("#emailmodalaprobar").val();
        var razonsocialmod = $("#razonsocialmodalaprobar").val();
          $.ajax({
            type: "POST",
            url: "emailaprobar.php",
            data: { email:emailmod, texto:textomod ,razonsocial:razonsocialmod },   
            success: function(data){
                swal("¡Aprobado!", "¡Numero de proveedor enviado!", "success")
                setTimeout( function() { 
                location.reload(); 
              }, 1000);
            }
          });

        var cuit = $("#cuitmodalaprobar").val()
        $.ajax({
          type: "POST",
          url: "generaEstado.php",
          data: { cuit:cuit, texto: "APROBADO" ,comentario: "PROVEEDOR APROBADO CON NUMERO"+textomod },
          success: function(response)
          {  
             console.log(response);
          },
          error: function(response)
          {
          }
        });
      })

      $(".buscarproveedor").click(function() {


        $.ajax({
            type: "GET",
            url: "http://dev-hac-web04.vicentelopez.gov.ar/stisla/getProveedor.php",
            data: { proveedor:  $("#nro_prov").val() },   
            success: function(data){
              if(data.length>2){
                var dat = data.split(",");
                
                if (dat[20]==1) 
                {
                  $("#nro_prov").val(dat[19]);
                  $('.btn-show-alert').click();
                  $("#modalproveedorrazonsocial").val(dat[1]);
                  $("#modalproveedortipo").val(dat[2]);
                  $("#modalproveedorcuit").val(dat[3]);
                  $("#modalproveedorfantasia").val(dat[4]);
                  $("#modalproveedortiposoc").val(dat[5]+" - "+dat[6]);
                  $("#modalproveedoringbrutos").val(dat[7]);
                  $("#modalproveedorfechaalta").val(dat[8]);
                  $("#modalproveedorfechaultcompra").val(dat[9]);
                  $("#modalproveedordireccion").val(dat[11]+"-"+dat[12]);
                  $("#modalproveedorpisodpto").val(dat[13]+"-"+dat[14]);
                  $("#modalproveedorlocalidad").val(dat[15]);
                  $("#modalproveedorprovincia").val(dat[18]);
                  $("#modalproveedoremail").val(dat[16]);
                  $("#modalproveedorcelular").val(dat[17]);
                  $("#modalproveedorcodprov").val(dat[19]);
                  $(".divproveedores").fadeIn("slow");

                  $.ajax({
                    type: "GET",
                    url: "http://dev-hac-web04.vicentelopez.gov.ar/stisla/proveedores-ora.php",
                    data: { proveedor:  $("#nro_prov").val() }, 
                    success: function(response)
                    { 
                      
                      if(response.length>2){
                      $('#proveedores').DataTable().destroy();
                      $(".exportaexcel").fadeIn("slow");
                      $('#tbodyproveedores').html(response).fadeIn();
                      $(".cargandoproveedores").hide();
                      $('.ordenesdecompra').fadeIn("slow");
                      $('#proveedores').DataTable(  {
                            dom: 'Bfrtip',
                            buttons: [
                            {

                                text: 'Exportar a PDF',
                                extend: 'pdf',
                                className: 'btn btn-success btn-xs'
                            },
                            {
                                text: 'Imprimir',
                                extend: 'print',
                                className: 'btn btn-warning btn-xs'
                            },
                            {
                                text: 'Exportar a Excel',
                                extend: 'excel',
                                className: 'btn btn-danger btn-xs'
                            }
                            ,
                            {
                                text: 'Copiar en el Portapapeles',
                                extend: 'copy',
                                className: 'btn btn-info btn-xs'
                            }
                            ]
                      });

                      }else{
                        
                      swal ( "¡Sin resultados!" ,  "No existen ordenes de compra para  este proveedor.",  "error" );
                    
                      $('.ordenesdecompra').hide();
                    }
                       
                    },
                    error: function(response)
                    {
                    }
                  });
                }else{
                  $("#proveedormodal").modal("show");
                  $(".divproveedores").fadeOut("slow");

                  $("#modal_body").html(data);
                   
                   //wal("PAAAAAAA MOOOONOO!", "SON COMO"+dat[19], "success")
                   //console.log(dat);
                }
              }else{
                $(".divproveedores").hide();
                
              }
             
                
                

            },
          error: function(data)
          {
            alert("error");
          }
          });

      })

      
        
      // RUBROS// 

      
       

      $(".buscarubros").click(function() {

          $(".divrubros").fadeIn("slow");
          $(".cargandorubros").show();
          
                
             
                  $.ajax({
                    type: "GET",
                    url: "http://dev-hac-web04.vicentelopez.gov.ar/stisla/rubrosporcodigo-ora.php",
                    data: { rubro:  $("#nro_rubro").val(),subrubro:  $("#nro_subrubro").val() }, 
                    success: function(response)
                    { 
                      
                      if(response.length>2){
                      $('#rubros').DataTable().destroy();
                      $(".exportaexcel").fadeIn("slow");
                      $('#tbodyrubros').html(response).fadeIn();
                      $(".cargandorubros").hide();
                      
                      $('#rubros').DataTable(  {
                            dom: 'Bfrtip',
                            buttons: [
                            {

                                text: 'Exportar a PDF',
                                extend: 'pdf',
                                className: 'btn btn-success btn-xs'
                            },
                            {
                                text: 'Imprimir',
                                extend: 'print',
                                className: 'btn btn-warning btn-xs'
                            },
                            {
                                text: 'Exportar a Excel',
                                extend: 'excel',
                                className: 'btn btn-danger btn-xs'
                            }
                            ,
                            {
                                text: 'Copiar en el Portapapeles',
                                extend: 'copy',
                                className: 'btn btn-info btn-xs'
                            }
                            ]
                      });
                      var aTag = $(".divrubros");
                      $('html,body').animate({scrollTop: aTag.offset().top},'slow');
                      }else{
                        
                      swal ( "¡Sin resultados!" ,  "No existen rubros con esa descripcion o numero.",  "error" );
                    
                    }
                       
                    },
                    error: function(response)
                    {
                    }
                  });

      })

    //RUBROS EXISTENTES///
        

          $(".divrubrosexistentes").fadeIn("slow");

                  $.ajax({
                    type: "GET",
                    url: "http://dev-hac-web04.vicentelopez.gov.ar/stisla/rubros-ora.php",
                    data: { rubro:  $("#nro_rubro").val() }, 
                    success: function(response)
                    { 
                      
                      if(response.length>2){
                      $('#rubrosexistentes').DataTable().destroy();
                      $(".exportaexcel").fadeIn("slow");
                      $('#tbodyrubrosexistentes').html(response).fadeIn();
                      
                      
                      $('#rubrosexistentes').DataTable(  {
                            dom: 'Bfrtip',
                            buttons: [
                            {

                                text: 'Exportar a PDF',
                                extend: 'pdf',
                                className: 'btn btn-success btn-xs'
                            },
                            {
                                text: 'Imprimir',
                                extend: 'print',
                                className: 'btn btn-warning btn-xs'
                            },
                            {
                                text: 'Exportar a Excel',
                                extend: 'excel',
                                className: 'btn btn-danger btn-xs'
                            }
                            ,
                            {
                                text: 'Copiar en el Portapapeles',
                                extend: 'copy',
                                className: 'btn btn-info btn-xs'
                            }
                            ]
                      });
                      
                      
                      }else{
                        
                      swal ( "¡Sin resultados!" ,  "No existen rubros con esa descripcion o numero.",  "error" );
                    
                    }
                    $('.rubroselecionado').css('cursor', 'pointer');
                     $(".rubroselecionado").click(function() {
                        var aTag = $("#anchorpararedi");
                        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
                        $('.rubroselecionado').css('cursor', 'pointer');
                      })  
                    },
                    error: function(response)
                    {
                    }
                  });

     
    
        
        
        //$(".divcheques").hide();
     

      
        
    
      $('#proveedorsender').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var oc = button.data('oc')
        var proveedor = button.data('proveedor')
        var anio = button.data('anio')
        $.ajax({
            type: "POST",
            url: "http://dev-hac-web04.vicentelopez.gov.ar/stisla/getOc.php",
            data: { oc: oc ,proveedor: proveedor,anio:anio },   
            success: function(data){

                //alert(data);
                var dat = data.split(",");
                $("#modalejerciciooc").val(dat[0]);
                $("#modalunioc").val(dat[1]);
                $("#modalnroadjudoc").val(dat[2]);
                $("#modalfechococ").val(dat[4]);
                $("#modallugemioc").val(dat[5]);
                $("#modalcodlugentoc").val(dat[7]);
                $("#modaltipodocaproboc").val(dat[10]);
                $("#modalnrodocaproboc").val(dat[11]);
                $("#modalaniodocaproboc").val(dat[12]);
                $("#modalfechconfirmoc").val(dat[14]);
                $("#modalimportetotoc").val(dat[17]);
                $("#modalocdiferidooc").val(dat[16]);
                $("#modalobservacionoc").val(dat[15]);

            },
          error: function(data)
          {
            alert("error");
          }
          });
      });
        
    });
  </script>     
</body>
</html>
