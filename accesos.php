<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Compras y licitaciones</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <link rel="stylesheet" href="assets/css/poncho.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="container">
      <div class="row ">
        <div class="col-md-2" style="margin-top: 20px;margin-bottom: 10px;">
          <h4>Compras y licitaciones</h4>
        </div>
        <div class="col-md-2 offset-md-6" style="margin-top: 10px;margin-bottom: 10px;">
          <a href="https://www.vicentelopez.gov.ar/" target="_blank" rel="noopener noreferrer">
            <img style="width: 230px;" alt="Logo MVL" class="encabezado__img" src="https://www.vicentelopez.gov.ar/assets/images/logo-color-19.png">
          </a>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <img width="100%" src="https://www.vicentelopez.gov.ar/assets/images/linea-header-pc.png" alt="linea decorativa">
      </div>
    </div>

    <div class="section container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:transparent">
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item active" aria-current="page">Compras y licitaciones</li>
        </ol>
      </nav>
      <br>

      <div class="card card-success oficina">
        <div class="row">
          <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="login-brand text-left">Proveedores</div>
            <div class="row">
              <div class="col-md-3">
                <a class="panel panel-default panel-icon" href="https://www.vicentelopez.gov.ar/portalproveedores/Identity/Account/Login" target="_blank" rel="noopener noreferrer">
                  <div class="panel-heading hidden-xs" style="background-color:#93AF37"><i class="fas fa-user-check"></i></div>
                  <div class="panel-body" style="height: 100px;">
                    <h3>Proveedores</h3>
                  </div>
                </a>
              </div>
              
              <div class="col-md-3">
                <a class="panel panel-default panel-icon" href="postulante.php">
                  <div class="panel-heading hidden-xs" style="background-color:#93AF37"><i class="fas fa-user-plus"></i></div>
                  <div class="panel-body" style="height: 100px;">
                    <h3>Postulante</h3>
                    <small style="padding-left: 30px;">(Nuevo)</small>
                  </div>
                </a>
              </div>
            </div>
            <button class="btn" style="background-color:#93AF37; color:white" type="button" data-toggle="collapse" data-target="#telefonoproveedores" aria-expanded="false">Teléfonos útiles</button>
            <div class="collapse" id="telefonoproveedores">
              <p>4711-2762 - 4711-2916</p>
            </div>
          </div>
        </div>
      </div>

      <div class="card card-success oficina">
        <div class="row">
          <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="login-brand text-left">Pliegos</div>
            <div class="row">
              <div class="col-md-3">
                <a class="panel panel-default panel-icon" href="https://www.vicentelopez.gov.ar/pliegos/pages/pliegos/pliegosNoAdjudicados.xhtml" target="_blank" rel="noopener noreferrer">
                  <div class="panel-heading hidden-xs" style="background-color:#93AF37"><i class="fas fa-clipboard-list"></i></div>
                  <div class="panel-body" style="height: 100px;">
                    <h3>Consulta</h3>
                  </div>
                </a>
              </div>
              <div class="col-md-3">
                <a class="panel panel-default panel-icon" href="https://www.vicentelopez.gov.ar/pliegos/pages/ordenes/pliegosAdjudicados.xhtml" target="_blank" rel="noopener noreferrer">
                  <div class="panel-heading hidden-xs" style="background-color:#93AF37"><i class="fas fa-clipboard-check"></i></div>
                  <div class="panel-body" style="height: 100px;">
                    <h3>Adjudicadas</h3>
                  </div>
                </a>
              </div>
            </div>
            <button class="btn" style="background-color:#93AF37; color:white" type="button" data-toggle="collapse" data-target="#telefonopliegos" aria-expanded="false">Teléfonos útiles</button>
            <div class="collapse" id="telefonopliegos">
              <p>4711-2762 - 4711-2916</p>
            </div>
          </div>
        </div>
      </div>

      <div class="simple-footer">
        <span style="color: #833682">VIVAMOS </span> <span><b>VICENTE LÓPEZ</b></span> 
        <span><img width="25px" height="25px" src="https://citymis.co/custom/vicentelopez/public/_img/logo.png" alt="Logo"></span>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>
</html>
