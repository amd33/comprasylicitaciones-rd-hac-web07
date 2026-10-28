<?php
  include("connecto2.php");
  session_start();

  // 1. PARCHE DE SEGURIDAD: Control de acceso (Frenamos la fuga)
  // Si no hay sesión activa o no tiene el permiso de administrador, bloqueamos el acceso.
  if (!isset($_SESSION['xpa']) || $_SESSION['xpa'] != 4573 || !in_array(1, $_SESSION['permisos'])) {
      header('HTTP/1.1 403 Forbidden');
      die("Acceso no autorizado");
  }

  // 2. PARCHE: Seleccionamos campos específicos (No usamos *)
  $sql = "SELECT ID, NOMBRE, APELLIDO, USUARIO, CORREO, HABILITADO, 
                 CASE WHEN HABILITADO = 1 THEN 'Si' ELSE 'No' END AS HABILIT 
          FROM usuario";

  foreach ($db->query($sql, PDO::FETCH_ASSOC) as $row) {
      // 3. PARCHE XSS: Sanitizamos cada campo antes de mostrarlo
      $id       = htmlspecialchars($row['ID'], ENT_QUOTES, 'UTF-8');
      $nombre   = htmlspecialchars($row['NOMBRE'], ENT_QUOTES, 'UTF-8');
      $apellido = htmlspecialchars($row['APELLIDO'], ENT_QUOTES, 'UTF-8');
      $usuario  = htmlspecialchars($row['USUARIO'], ENT_QUOTES, 'UTF-8');
      $correo   = htmlspecialchars(trim($row['CORREO']), ENT_QUOTES, 'UTF-8');
      $habilit  = htmlspecialchars(trim($row['HABILIT']), ENT_QUOTES, 'UTF-8');
?>

    <tr data-ri="0" class="warning" role="row"
        data-id="<?php echo $id; ?>"
        data-nombre="<?php echo $nombre; ?>"
        data-apellido="<?php echo $apellido; ?>"
        data-usuario="<?php echo $usuario; ?>"
        data-correo="<?php echo $correo; ?>"
        data-habilitado="<?php echo $habilit; ?>">

        <td><?php echo $id; ?></td>
        <td><?php echo $nombre; ?></td>
        <td><?php echo $apellido; ?></td>
        <td><?php echo $usuario; ?></td>
        <td><?php echo $correo; ?></td>
        <td><?php echo $habilit; ?></td>

        <td colspan="1" style="padding:0.1%">
            <?php if ($row['HABILITADO'] == 1): ?>
                <a class="btn btn-outline-danger borrar" data-id="<?php echo $id; ?>">
                    <i class="fa fa-times" aria-hidden="true" title="Bloquear"></i>
                </a>
            <?php else: ?>
                <a class="btn btn-outline-success activar" data-id="<?php echo $id; ?>">
                    <i class="fa fa-check" aria-hidden="true" title="Activar"></i>
                </a>
            <?php endif; ?>
        </td>
    </tr>

<?php } ?>
