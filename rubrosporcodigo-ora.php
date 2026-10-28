<?php
header('Access-Control-Allow-Origin: *');
class PDOConnection {

    private $dbh;

    function __construct() {
        try {
            $server         = "192.9.103.53";
	    $db_username    = "reportesnm";
	    $db_password    = "r3p0rt3snm";
            $service_name   = "mvlopez";
            $sid            = "mvlopez";
            $port           = 1521;
            $dbtns          = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $server)(PORT = $port)) (CONNECT_DATA = (SERVICE_NAME = $service_name) (SID = $sid)))";

            //$this->dbh = new PDO("mysql:host=".$server.";dbname=".dbname, $db_username, $db_password);

            $this->dbh = new PDO("oci:dbname=" . $dbtns . ";charset=utf8", $db_username, $db_password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function select($sql) {
        $sql_stmt = $this->dbh->prepare($sql);
        $sql_stmt->execute();
        $result = $sql_stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function __destruct() {
        $this->dbh = NULL;
    }

}
$dbh = new PDOConnection();


if (is_numeric($_GET['rubro'])) {
/*
$select_sql = "SELECT * FROM PROVEEDORES WHERE  UPPER(razon_social) like '%".strtoupper($_GET['rubro'])."%'";
foreach ($dbh->select($select_sql) as $row) {

    $select_sql = "SELECT * FROM orden_compra WHERE cod_prov = ".$row['COD_PROV'];

   }
}
//$select_sql = "SELECT * FROM rubros WHERE cod_prov = ".$_GET['rubro'];*/
$select_sql = "SELECT a.cod_prov, a.descripcion, a.codigo, r.descripcion_rubro, a.cod_subrubro, r.descripcion_subrubro,j.*
  FROM reportesnm.vis_proveedores a, reportesnm.rubros r , reportesnm.proveedores j
   where  a.cod_prov = j.cod_prov
   AND a.codigo =  ".$_GET['rubro']."
  AND  a.cod_subrubro =  ".$_GET['subrubro']."

  and a.codigo = r.cod_rubro

  and a.cod_subrubro = r.cod_subrubro";
}else{

$select_sql = "SELECT a.cod_prov, a.descripcion, a.codigo, r.descripcion_rubro, a.cod_subrubro, r.descripcion_subrubro,j.*
  FROM reportesnm.vis_proveedores a, reportesnm.rubros r , reportesnm.proveedores j
   where  a.cod_prov = j.cod_prov
   AND a.codigo =  ".$_GET['rubro']."
  AND  a.cod_subrubro =  ".$_GET['subrubro']."

  and a.codigo = r.cod_rubro

  and a.cod_subrubro = r.cod_subrubro";
}
//SELECT * FROM proveedores WHERE cod_prov = 6363";
$salida = $dbh->select($select_sql);
//print_r($salida);

foreach ($dbh->select($select_sql) as $row) {
    ?>
<tr>
  
  <td><?php echo $row['DESCRIPCION_SUBRUBRO'];?></td>
  <td><?php echo $row['RAZON_SOCIAL'];?></td>
  <td><?php echo $row['CUIT'];?></td>
  <td><?php echo $row['EMAIL'];?></td>
  <td><?php echo $row['DESCRIPCION'];?></td>
  <td><?php echo $row['FECHA_ULT_COMP'];?></td>
  
 
</tr>
   


<?php
}
  
?>
