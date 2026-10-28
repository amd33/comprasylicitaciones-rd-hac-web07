<?php require_once 'check_session.php'; ?>
<?php
include("conect.php");

$selectcupos ='SELECT * from recibos_cupos_cursos_manipulacion';
    
    foreach ($db -> query($selectcupos) as $resultado) {
           echo $resultado["N_CUPOS"]." - ";
           echo $resultado["N_RECIBO"]." - ";

           $selectrecibo ='SELECT * from recibos WHERE n_comprob ='.$resultado["N_RECIBO"];
           foreach ($db -> query($selectrecibo) as $resultado) {
                   echo $resultado["N_CUOTA"]." - ";
                   echo $resultado["N_ANO"]."<br>";
            }
        }
   
    
    

?>
