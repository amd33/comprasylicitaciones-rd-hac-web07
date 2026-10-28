<?php

include 'connecto2.php';

$query = " SELECT * FROM apertura";

$index=0;

echo "<table>";

foreach ($db -> query($query) as $row) {
    echo "<tr>";
    echo '<td>'.$row["ID"].'</td>
          <td>'.$row["DESCRIPCION"].'</td>
          <td>'.$row["TIPO"].'</td>
          <td>'.$row["FECHA"].'</td>';
    $index++;
    echo "</tr>";
}

echo "</table>";


