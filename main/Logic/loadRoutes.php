<?php
//include "../control/init.php";
include "../control/classes/db.php";
include "../control/classes/source.php";
include "../control/classes/dataSource.php";
$source = new source;

function prueba($source){
    $dataSourse =  dataSource::getInstance();
    $query = "select * from usuario";
    $result = $dataSourse->getConn()->query($query);
    echo $dataSourse->closeConn();    
    echo "
     <table border = 1 cellspacing = 1 cellpadding = 1>
         <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
         </tr>";
    while($row = $result->fetch_assoc()){
        echo "
         <tr>
            <td>".$row["numruta"]."</td>
            <td>".$row["descripcion"]."</td>
            <td>".$row["pasaje"]."</td>
            <td>".$row["duracion"]."</td>
            <td>".$row["transporteespecial"]."</td>
            <td>".$row["horaatencioninicio"]."</td>
            <td>".$row["horaatencionfinal"]."</td>
            <td>
                <span class=\"table-remove text-center\"><button type=\"button\"
                class=\"btn btn-success btn-rounded btn-sm my-0\">Actualizar</button></span>
            </td>       
            <td>
                <span class=\"table-remove text-center\"><button type=\"button\"
                class=\"btn btn-success btn-rounded btn-sm my-0\">Eliminar</button></span>
            </td>
         </tr>";
    }
    echo "</table>";
    }
    
    prueba($source);



?>