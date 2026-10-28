<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Compras Y Licitaciones</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
  <div id="app">
    <?php
    function validarPasswd($dn, $passwd,$conn)
      {

       $ok = ldap_bind ($conn, $dn, $passwd);
       

           
           return $ok;
      }

    if (isset($_POST['email'])) {
      $ldapserver = 'mvlcuvldc01.vicentelopez.gov.ar';
      $ldapuser      = $_POST['email'];
      $ldappass     = $_POST['password'];
      $ldaptree    = "OU=Palacio,OU=Hacienda,OU=Usuarios y Workstations,OU=MVL,DC=vicentelopez,DC=gov,DC=ar";
 //$ldaptree    = "OU=Usuarios y Workstations,OU=MVL,DC=vicentelopez,DC=gov,DC=ar";
      $ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");

      $ok = validarPasswd($ldapuser, $ldappass, $ldapconn);
      if($ok)
      {
         //
            $result = ldap_search($ldapconn,$ldaptree, "(cn=*)") or die ("Error in search query: ".ldap_error($ldapconn));
            $data = ldap_get_entries($ldapconn, $result);
           
            // SHOW ALL DATA
            //echo '<h1>Dump all data</h1><pre>';
            //print_r($data);   
            //echo '</pre>';
           
           
            // iterate over array and print data for each entry
            
            for ($i=0; $i<$data["count"]; $i++) {
                //echo "dn is: ". $data[$i]["dn"] ."<br />";
                
                if(isset($data[$i]["mail"][0])) {
                  
                  if ($data[$i]["mail"][0]==$ldapuser) {
                    $_SESSION['usuario'] = $data[$i]["cn"][0];
                    header('Location: contrataciones.php');
                  }else{
                        $msjerror= '<div class="alert alert-warning" >
                          El usuario NO pertenece al grupo de acceso!
                        </div>';
                      } 
                }
            }
          //
        //header('Location: contrataciones.php');
      }else{$msjerror= '<div class="alert alert-warning" >
            Usuario o contraseña Incorrecto!
          </div>';}
    }

    ?>
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white" >
          <div class="p-4 m-3" >
            <div style="margin-top: 130px">
              
            </div>
            <h5 class="text-dark font-weight-normal"><span style="font-size: 24px;text-transform: uppercase;letter-spacing: 2px;color: #666;text-align: center;">Compras Y licitaciones</span></h5>
            <p class="text-muted">Gestion de licitaciones y contrataciones</p>
            <form method="POST" action="#" class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="legajo">Usuario</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Revisa tu email@vicentelopez.gov.ar
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Contraseña</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  Revisa tu contraseña
                </div>
              </div>
              <div class="form-group ">
                <?php echo $msjerror ?>
              </div>
              
              <div class="form-group text-right">
                <a href="auth-forgot-password.php" class="float-left mt-3">
                  Olvidaste tu contraseña?
                </a>
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Ingresar
                </button>
              </div>

              <div class="mt-5 text-center">
                No tenes cuenta? <a href="auth-register.php">Crear Una</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              <div class="simple-footer" >
                <span style="color: #833682">VIVAMOS  </span> <span><b>VICENTE LÓPEZ</b></span> <span><img width="25px" height="25px" src="https://citymis.co/custom/vicentelopez/public/_img/logo.png" alt=""></span> 
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12  order-1 min-vh-100  " style="background-size: cover" data-background="http://www.tres65.com/wp-content/uploads/2018/03/Municipalidad-de-Vicente-L%C3%B3pez.jpg" >
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold  " style="background: rgba(215,215,215,0.3);">
                  <?php 
                    $hora=localtime();
                    if ($hora["2"] <=12) {
                      echo "¡Buen día!";
                    }else{
                      if ($hora["2"] <=20) {
                        echo "¡Buenas tardes!";
                      }else{
                        echo "¡Buenas noches!";
                      }
                    }
                  ?>
                </h1>
                <h5 class="font-weight-normal text-muted-transparent " style="background: rgba(215,215,215,0.3);">Municipalidad de Vicente López</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

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
  <script>
    var  dia = new Date(); 
    var  hora = dia.getHours(); 
    var  minutos = dia.getMinutes(); 
    var  segundos = dia.getSeconds();
    if (hora>20) {
      $(".imagen").css({ "backgroundColor": "black", "color": "white" });
        
    }
  </script>
  <!-- Page Specific JS File -->
</body>
</html>
