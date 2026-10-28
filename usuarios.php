<?php
include 'connecto2.php';

session_start();

// PARCHE: Validación de seguridad de sesión mejorada
if (!isset($_SESSION['xpa']) || $_SESSION['xpa'] != 4573) {
    echo "Usuario No autorizado";
  die;
}

// PARCHE: Validación de permisos y redirección segura
if (!isset($_SESSION['cn']) || !in_array(1, $_SESSION['permisos'])) {
    header('Location: index.php');
    exit; // Importante para detener la ejecución
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Usuarios</title>

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
                <font color="#8bc584">Hola, <?php echo htmlspecialchars($_SESSION['cn'] ?? '', ENT_QUOTES, 'UTF-8'); ?></font>
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
            <h1>Usuarios</h1>
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
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Correo Electrónico</th>
                            <th>Habilitado</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody id="tbodyusuarios">
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
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/js/scripts.js"></script>

  <script>
    $(document).ready(function () {
      cargarUsuarios();
    });

    function cargarUsuarios() {
      $.ajax({
        type: 'POST',
        url: "getUsuarios.php",
        success: function(response){
          if ($.fn.DataTable.isDataTable('#pliegos')) {
            $('#pliegos').DataTable().destroy();
          }
          $('#tbodyusuarios').html(response);
          $('#pliegos').DataTable({ "scrollX": true });
        }
      });
      $(".bandeja, .consulta-entidades").addClass("active");
    }

    // PARCHE DE SEGURIDAD PARA XSS PERSISTENTE EN EL BLOQUEO
    $(document).on("click", ".borrar", function(event){
        let this_tr = $(this).closest('tr');
        let id = this_tr.data("id");
        
        // SEGURIDAD: Obtenemos Nombre (col 1) y Apellido (col 2) como texto plano
        let nombre = this_tr.find('td:eq(1)').text().trim();
        let apellido = this_tr.find('td:eq(2)').text().trim();
        let usuarioCompleto = nombre + " " + apellido;

        if ( confirm('¿Está seguro de bloquear al usuario ' + usuarioCompleto + '?') ){
            $.ajax({
                type: "POST",
                url: "bloquearUsuario.php",
                data: { id: id },
                success: function(response){
                    alert('El usuario ya no está habilitado.');
                    location.reload();
                },
                error: function() { alert("error"); }
            });
        }
    });

    $(document).on("click", ".activar", function(event){
        let id = $(this).closest('tr').data("id");
        $.ajax({
            type: "POST",
            url: "activarUsuario.php",
            data: { id: id },
            success: function(response){
                alert('El usuario fue habilitado.');
                location.reload();
            },
            error: function() { alert("error"); }
        });
    });

    function filtro() {
        var tecla = event.key;
        if (['.','e'].includes(tecla)) event.preventDefault();
    }
  </script>
</body>
</html>
