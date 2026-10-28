<?php
session_start();
// PARCHE: Inicializamos la variable para que no de error si no hay POST
$msjerror = '';

if (isset($_POST['email'])) {
    $ldapserver = 'mvlcuvldc01.vicentelopez.gov.ar';
    // PARCHE: Sanitización básica del input
    $ldapuser   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $ldappass   = $_POST['password'];
    $ldaptree   = "OU=Palacio,OU=Hacienda,OU=Usuarios y Workstations,OU=MVL,DC=vicentelopez,DC=gov,DC=ar";
    
    // PARCHE: Conexión silenciosa sin revelar tecnología en el 'die'
    $ldapconn = @ldap_connect($ldapserver);
    
    if ($ldapconn) {
        @ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
        @ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

        // PARCHE: Bind silencioso
        $ok = @ldap_bind($ldapconn, $ldapuser, $ldappass);

        if($ok) {
            // PARCHE: Búsqueda quirúrgica (solo el mail que entra) en lugar de traer todo con (cn=*)
            $filter = "(mail=$ldapuser)";
            $result = @ldap_search($ldapconn, $ldaptree, $filter);
            
            if ($result) {
                $data = @ldap_get_entries($ldapconn, $result);

                if ($data["count"] > 0) {
                    // PARCHE: Seguridad de sesión
                    session_regenerate_id(true);
                    // Sanitizamos el CN al guardarlo por si tiene caracteres maliciosos
                    $_SESSION['usuario'] = htmlspecialchars($data[0]["cn"][0], ENT_QUOTES, 'UTF-8');
                    header('Location: altapliego_adm.php');
                    exit();
                } else {
                    $msjerror = '<div class="alert alert-warning">El usuario NO pertenece al grupo de acceso!</div>';
                }
            }
        } else {
            $msjerror = '<div class="alert alert-warning">Usuario o contraseña Incorrecto!</div>';
        }
        @ldap_close($ldapconn);
    } else {
        // Error genérico si el servidor no responde
        $msjerror = '<div class="alert alert-danger">Servicio de autenticación no disponible.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Compras Y Licitaciones</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white" >
          <div class="p-4 m-3" >
            <div style="margin-top: 130px"></div>
            <h5 class="text-dark font-weight-normal"><span style="font-size: 24px;text-transform: uppercase;letter-spacing: 2px;color: #666;text-align: center;">Compras Y licitaciones</span></h5>
            <p class="text-muted">Gestion de pliegos</p>
            
            <form method="POST" action="#" class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="email">Usuario</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">Revisa tu email@vicentelopez.gov.ar</div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Contraseña</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">Revisa tu contraseña</div>
              </div>

              <div class="form-group">
                <?php echo $msjerror; ?>
              </div>

              <div class="form-group text-right">
                <a href="auth-forgot-password.php" class="float-left mt-3">¿Olvidaste tu contraseña?</a>
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">Ingresar</button>
              </div>

              <div class="mt-5 text-center">
                No tenes cuenta? <a href="auth-register.php">Crear Una</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              <div class="simple-footer" >
                <span style="color: #833682">VIVAMOS  </span> <span><b>VICENTE LÓPEZ</b></span> 
                <span><img width="25px" height="25px" src="https://citymis.co/custom/vicentelopez/public/_img/logo.png" alt=""></span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8 col-12 order-1 min-vh-100" style="background-image: url('http://www.tres65.com/wp-content/uploads/2018/03/Municipalidad-de-Vicente-L%C3%B3pez.jpg'); background-size: cover;" >
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold" style="background: rgba(215,215,215,0.3);">
                  <?php
                    $hora=localtime();
                    if ($hora["2"] <= 12) { echo "¡Buen día!"; }
                    elseif ($hora["2"] <= 20) { echo "¡Buenas tardes!"; }
                    else { echo "¡Buenas noches!"; }
                  ?>
                </h1>
                <h5 class="font-weight-normal text-muted-transparent" style="background: rgba(215,215,215,0.3);">Municipalidad de Vicente López</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>
</html>
