<?php 
include 'conect.php';
session_start();

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
  <link rel="stylesheet" href="node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="node_modules/summernote/dist/summernote-bs4.css">

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
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="fas fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
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
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-3.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="fas fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hola, Nombre Apellido</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="fas fa-user"></i> Perfil
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
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
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Contrataciones</span></a>
                <ul class="nav nav-tabs dropdown-menu"  role="tablist">
                  <li class="nav-item">
              <a class="nav-link" href="contrataciones.php" >Postulados</a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link " href="contrataciones.php" >Proveedores</a>
            </li>
            
                </ul>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Licitaciones</span></a>
                <ul class="nav nav-tabs dropdown-menu" id="pills-tab" role="tablist">
                  <li class="nav-item">
              <a class="nav-link  active " href="#pills-activas" role="tab" data-toggle="tab" aria-selected="true">Activas</a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#pills-publicadas" role="tab" data-toggle="tab">Publicadas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#pills-agregar" role="tab" data-toggle="tab">Agregar</a>
            </li>
                </ul>
              </li>
              
              
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active " id="pills-activas" role="tabpanel" aria-labelledby="pills-home-tab">
            <section class="section">
              <div class="section-header">
                <h1>Activas</h1>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="#">Licitacones</a></div>
                  <div class="breadcrumb-item">Activas</div>
                </div>
              </div>            
              <div class="row">
                <div class="section-body">
                  <h2 class="section-title">Activas</h2>
                </div>             
              </div>
              <div class="cargando" style="display: block"><img src="loading-spinner-bzn.gif" style="display:block;margin:auto;" alt="cargando" class="img-fluid" ></div>
              <div class="row divactivas"  style="display:none">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                  <div class="card">
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table id="activas" class="table table-striped table-bordered dt-responsive nowrap" >
                                <thead>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Tipo</th>
                                        <th>Secretaria</th>
                                        <th>Estado</th>
                                        <th>Objeto</th>
                                        <th class="text-center">Accion</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyactivas">
                                </tbody>
                            </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="tab-pane fade " id="pills-publicadas" role="tabpanel" aria-labelledby="pills-profile-tab">
          <section class="section">
          <div class="section-header">
            <h1>Publicadas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Licitaciones</a></div>
              <div class="breadcrumb-item">Publicadas</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Publicadas</h2>
            <p class="section-lead">
              Licitaciones <code>Publicadas</code>
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  
                  <div class="card-body">
                    <div class="cargando" style="display: block"><img src="loading-spinner-bzn.gif" style="display:block;margin:auto;" alt="cargando" class="img-fluid" ></div>
                        <div class="row divpublicadas"  style="display:none">
                          <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                            <div class="card">
                              <div class="card-body p-0">
                                <div class="table-responsive">
                                  <table id="publicadas" class="table table-striped table-bordered dt-responsive nowrap" >
                                          <thead>
                                              <tr>
                                                  <th>Numero</th>
                                                  <th>Tipo</th>
                                                  <th>Secretaria</th>
                                                  <th>Estado</th>
                                                  <th>Objeto</th>
                                                  <th class="text-center">Accion</th>
                                              </tr>
                                          </thead>
                                          <tbody id="tbodypublicadas">
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
          <div class="tab-pane fade " id="pills-agregar" role="tabpanel" aria-labelledby="pills-profile-tab">
          <section class="section">
          <div class="section-header">
            <h1>Agregar</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Licitaciones</a></div>
              <div class="breadcrumb-item">Agregar</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Agregar</h2>
            <p class="section-lead">
              Datos de la <code>licitacion</code> 
            </p>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  
                  <div class="card-body row">
                      <div class="form-group  col-md-3  col-sm-3 offset-1">
                        <label for="" class="col-form-label">Numero :</label>
                        <input type="text" class="form-control" readonly=""  id="" value="<?php //echo random_int(1, 1500); ?>"></input>
                      </div>
                      <div class="form-group  col-md-3  col-sm-3">
                        <label for="" class="col-form-label">Objeto :</label>
                        <input type="text" class="form-control"  id=""></input>
                      </div>
                      
                      <div class="form-group  col-md-3  col-sm-3">
                        <label for="" class="col-form-label">Tipo :</label>
                        <input type="text" class="form-control"  id=""></input>
                      </div>
                      

                      <div class="form-group  col-md-3  col-sm-3 offset-1">
                        <label for="" class="col-form-label">Presupuesto :</label>
                        <input type="text" class="form-control"  id="" value="<?php //echo random_int(2500, 90000); ?>"></input>
                      </div>
                      <div class="form-group  col-md-3  col-sm-3">
                        <label for="" class="col-form-label">Valor del pliego :</label>
                        <input type="text" class="form-control"  id="" value="<?php //echo random_int(390, 8000); ?>"></input>
                      </div>
                      <div class="form-group  col-md-3  col-sm-3 ">
                        <label for="" class="col-form-label">Aclaraciones :</label>
                        <input type="text" name="" id="" class="form-control"></input>
                      </div>
                      <div class="form-group  col-md-3  col-sm-3 offset-1">
                        <label for="" class="col-form-label">Archivo :</label>
                        <input type="file" class="form-control"  id=""></input>
                      </div>
                      <div class="form-group  col-md-3  col-sm-3">
                        <label for="" class="col-form-label">Titulo :</label>
                        <input type="text" class="form-control"  id=""></input>
                      </div>
                      <div class="form-group  col-md-3  col-sm-3">
                        <label for="" class="col-form-label">Descripcion :</label>
                        <input type="text" class="form-control"  id=""></input>
                      </div>
                      <div class="input-group col-md-3  col-sm-3 offset-1">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Secretaria</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                          <option value="">HACIENDA</option>
                          <option value="">GOBIERNO</option>
                          <option value="">LEGAL Y TENICA</option>
                        </select>
                      </div>
                      
                      <div class="input-group col-md-6 col-sm-6">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Descripcion</span>
                        </div>
                        <textarea style="margin-top: 0px; margin-bottom: 0px; height: 110px;" class="form-control" aria-label="With textarea"></textarea>
                      </div>
                      <div class="form-group col-md-3  col-sm-3 offset-1">
                        <button class=" btn btn-success btn-xs">Agregar</button>
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
              <h5 >Informacion</h5>
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
                      <input type="text" class="form-control" id="razonsocialmodalinfo">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="situacionafipmodalinfo" class="col-form-label">Situacion afip</label>
                      <input type="text" class="form-control" id="situacionafipmodalinfo">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="iibbmodalinfo" class="col-form-label">IIBB</label>
                      <input type="text" class="form-control" id="iibbmodalinfo">
                    </div>
                  
                    <div class="form-group col-md-3" >
                      <label for="telefonomodalinfo" class="col-form-label">Telefono</label>
                      <input type="text" class="form-control" id="telefonomodalinfo">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="emailmodalinfo" class="col-form-label">Email</label>
                      <input type="text" class="form-control" id="emailmodalinfo">
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="col-md-12 card-header"><h5>Domicilio Comercial</h5> </div>
                  <div class="card-body row">
                    <div class="form-group col-md-3" >
                      <label for="callemodalinfo" class="col-form-label">Calle</label>
                      <input type="text" class="form-control" id="callemodalinfo">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="pisomodalinfo" class="col-form-label">Piso</label>
                      <input type="text" class="form-control" id="pisomodalinfo">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="departamentomodalinfo" class="col-form-label">Departamento</label>
                      <input type="text" class="form-control" id="departamentomodalinfo">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="localidadmodalinfo" class="col-form-label">Localidad </label>
                      <input type="text" class="form-control" id="localidadmodalinfo">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="localidadmodalinfo" class="col-form-label">Codigo postal</label>
                      <input type="text" class="form-control" id="cpostalmodalinfo">
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="col-md-12 card-header"><h5>Domicilio Comercial</h5> </div>
                  <div class="card-body row">

                    <div class="form-group col-md-3" >
                      <label for="callemodalinfo" class="col-form-label">Calle</label>
                      <input type="text" class="form-control" id="callemodalinfo">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="pisomodalinfo" class="col-form-label">Piso</label>
                      <input type="text" class="form-control" id="pisomodalinfo">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="departamentomodalinfo" class="col-form-label">Departamento</label>
                      <input type="text" class="form-control" id="departamentomodalinfo">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="localidadmodalinfo" class="col-form-label">Localidad </label>
                      <input type="text" class="form-control" id="localidadmodalinfo">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="localidadmodalinfo" class="col-form-label">Codigo postal</label>
                      <input type="text" class="form-control" id="cpostalmodalinfo">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Enviar</button>
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
                  <input type="text" class="form-control" id="emailmodalaprobar">
                </div>
                <div class="form-group">
                  <label for="razonsocialmodalaprobar" class="col-form-label">Razon social:</label>
                  <input type="text" class="form-control" id="razonsocialmodalaprobar">
                </div>
                <div class="form-group">
                  <label for="cuitmodalaprobar" class="col-form-label">Cuit:</label>
                  <input type="text" class="form-control" id="cuitmodalaprobar">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
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
                  <label for="modalemailsender" class="col-form-label">Email:</label>
                  <input type="text" class="form-control" readonly="" id="modalemailsender">
                </div>
                <div class="form-group">
                  <label for="modalemailrazonsocial" class="col-form-label">Razon Social:</label>
                  <textarea class="form-control" id="modalemailrazonsocial"></textarea>
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Texto:</label>
                  <textarea class="form-control" id="message-text-sender"></textarea>
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
  <script src="node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

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
    $(document).ready(function() {


      $.ajax({
          type: "POST",
          url: "getLicitacionesactivas.php",
          //data: form_data,
          success: function(response)
          {  

            if(response.length>2){
            $('#activas').DataTable().destroy();
            $(".exportaexcel").fadeIn("slow");
            $('#tbodyactivas').html(response).fadeIn();
            $(".cargando").hide();
            $(".divactivas").fadeIn("slow");
            $('#activas').DataTable(  {
                  

            });
            }else{swal ( "¡Sin resultados!" ,  "No existen resultados con este criterio de busqeuda ",  "error" );}
             
          },
          error: function(response)
          {
          }
        });
      $.ajax({
          type: "POST",
          url: "getLicitacionesactivas.php",
          //data: form_data,
          success: function(response)
          {  

            if(response.length>2){
            $('#publicadas').DataTable().destroy();
            $(".exportaexcel").fadeIn("slow");
            $('#tbodypublicadas').html(response).fadeIn();
            $(".cargando").hide();
            $(".divpublicadas").fadeIn("slow");
            $('#publicadas').DataTable(  {
                  

            });
            }else{swal ( "¡Sin resultados!" ,  "No existen resultados con este criterio de busqeuda ",  "error" );}
             
          },
          error: function(response)
          {
          }
        });
      $.ajax({
          type: "POST",
          url: "//getProveedor.php",
          //data: form_data,
          success: function(response)
          {  

            if(response.length>2){
            $('#proveedor').DataTable().destroy();
            $(".exportaexcel").fadeIn("slow");
            $('#tbodyproveedor').html(response).fadeIn();
            $(".cargando").hide();
            $(".divproveedor").fadeIn("slow");

            
            $('#proveedor').DataTable( {
            deferRender:    true,
            scrollY:        200,
            scrollCollapse: true,
            scroller:       true
        } );
            }else{swal ( "¡Sin resultados!" ,  "No existen resultados con este criterio de busqeuda ",  "error" );}
             
          },
          error: function(response)
          {
          }
        });

      $('#info').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var cuit = button.data('cuit') // Extract info from data-* attributes
        var razonsocial = button.data('razonsocial')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Informacion del C.U.I.T numero ' + cuit)
        modal.find('#razonsocialmodalinfo').val(razonsocial)
        modal.find('#cuitmodalinfo').val(cuit)
      })
      $('#aprobar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var cuit = button.data('cuit') // Extract info from data-* attributes
        var emailmodalaprobar = button.data('email') // Extract info from data-* attributes
        var modalemailrazonsocial = button.data('razonsocial')
        
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Vas a aprobar el C.U.I.T numero ' + cuit)
        modal.find('.modal-body input').val(cuit)
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
        modal.find('.modal-title').text('Actividad del cuit numero ' + cuit)
        modal.find('.modal-body input').val(cuit)
      })
      $('#emailsender').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var email = button.data('email')
        var modalemailrazonsocial = button.data('razonsocial')
         // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Enviar pedido de informacion  a ' + email)
        modal.find('.modal-body input').val(email)
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
                swal("HECHO!", "¡Pedido de informacion enviado!", "success")
            }
          });
      })
      $("#aprobarporemail").click(function() {
        var textomod = $("#message-text-sender").val();
        var emailmod = $("#emailmodalaprobar").val();
        var razonsocialmod = $("#razonsocialmodalaprobar").val();
          $.ajax({
            type: "POST",
            url: "emailaprobar.php",
            data: { email:emailmod, texto:textomod ,razonsocial:razonsocialmod },   
            success: function(data){
                swal("HECHO!", "¡Numero de proveedor enviado!", "success")
            }
          });
      })

    } );
  </script>     
</body>
</html>
