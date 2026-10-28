<?php
include 'connecto2.php';

session_start();

// PARCHE: Validación de sesión más robusta
if (!isset($_SESSION['cn'])){
  header('Location: index.php');
  exit; // Siempre usar exit después de un header Location
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Proveedores Pliegos</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar" style="padding-top: 0px;">
        <form class="form-inline mr-auto"></form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">
                <font color="#8bc584">Hola, <?php echo htmlspecialchars($_SESSION['cn'], ENT_QUOTES, 'UTF-8'); ?></font>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Salir
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Proveedores Pliegos (Desarrollo)</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card" style="margin-top: 5px">
                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="modificapliegos.php">Grilla de Pliegos</a></p>
                </div>
              </div>
            </div>

            <div class="row divpliegos">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id="pliegos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead>
                          <tr>
                            <th>Contratación</th>
                            <th>Número</th>
                            <th>Año</th>
                            <th>Objeto</th>
                            <th>Nro Proveedor</th>
                            <th>Proveedor</th>
                            <th>Cuit</th>
                            <th>Email</th>
                            <th>Fecha-Hora</th>
                            <th>Acciones</th>
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
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          <span style="color: #833682">VIVAMOS </span> <span><b>VICENTE LÓPEZ</b></span>
        </div>
        <div class="footer-right">2026</div>
      </footer>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function () {
        // Inicialización de DataTable
        $('#pliegos').DataTable({ "scrollX": true });

        // Carga de datos vía AJAX
        $.ajax({
            type: 'POST',
            url: "getprovPliegos.php",
            success: function(response){
                // PARCHE: Destruir instancia previa para evitar conflictos al re-inyectar HTML
                if ($.fn.DataTable.isDataTable('#pliegos')) {
                    $('#pliegos').DataTable().destroy();
                }
                $('#tbodypliegos').html(response);
                $('#pliegos').DataTable({ "scrollX": true });
            }
        });

        $(".bandeja, .consulta-entidades").addClass("active");
    });

    // PARCHE: Confirmación segura contra XSS
    $(document).on("click", ".borrar", function(event){
        let this_tr = $(this).closest('tr');
        let idpliego = this_tr.data("idpliego");
        let tipo = this_tr.data("tipo");
        let nroproveedor = this_tr.data("nroproveedor");
        let anopliego = this_tr.data("anopliego");

        // SEGURIDAD: Extraemos el nombre del proveedor de la columna 5 (índice 5) como texto plano
        let nombreProveedor = this_tr.find('td:eq(5)').text().trim();

        if ( confirm('¿Está seguro de borrar el registro del proveedor: ' + nombreProveedor + '?') ){
            $.ajax({
                type: "POST",
                url: "borrarProvPliego.php",
                data: {
                    idpliego: idpliego,
                    tipo: tipo,
                    nroproveedor: nroproveedor,
                    anopliego: anopliego
                },
                success: function(response){
                    alert('Operación realizada con éxito.');
                    location.reload();
                },
                error: function() { alert("error"); }
            });
        }
    });

    function filtro() {
        var tecla = event.key;
        if (['.','e'].includes(tecla)) event.preventDefault();
    }
  </script>
</body>
</html>
