<?php
include 'conect.php';

$select ="SELECT ID FROM AGENTE WHERE cuit =".str_replace("-", "", $_REQUEST["cuit"]);
echo $select;
foreach ($db->query($select) as $sarasa) {

	
	$sara="SELECT * FROM actividades WHERE cod_actividad =".$_REQUEST["datita"];
	foreach ($db->query($sara) as $row) {
		$insertrubro="INSERT INTO RUBRO  VALUES (".$sarasa['ID'].",'".$row['DESC_ACTIVIDAD']."',".$_REQUEST["datita"].")";
	    echo $insertrubro;
	    $db->query($insertrubro);

	}
    

 }     
?>
